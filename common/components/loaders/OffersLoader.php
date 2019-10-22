<?php
namespace common\components\loaders;

use common\models\ECategories;
use common\models\ECategoriesOffers;
use common\models\EOfferParams;
use common\models\EOffers;
use Yii;

class OffersLoader extends BaseLoader
{
    public function load()
    {
        if (!isset($this->xmlData->shop->offers->offer)) {
            Yii::error('Не удалось распарсить XML', $this->logType);
            return false;
        }

        foreach ($this->xmlData->shop->offers->offer as $offerItem) {
            $attr = (array)$offerItem->attributes();
            
            $shopId = (int)$attr['@attributes']['id'];

            $offerModel = EOffers::findOne(['shop_id' => $shopId]) ?? new EOffers();
            $isNewOffer = $offerModel->isNewRecord;

            $anonsPic = $this->saveImage((string)$offerItem->anonsPic);
            
            $offerModel->setAttributes([
                'available' => $attr['@attributes']['available'] === 'true' ? 1 : 0,
                'shop_id' => $shopId,
                'shop_url' => (string)$offerItem->url,
                'price' => (float)$offerItem->price,
                'currency' => (string)$offerItem->currencyId,
                'qty' => (int)$offerItem->qty,
                'vendor_code' => (string)$offerItem->vendorCode,
                'shop_anons_pic' => (string)$offerItem->anonsPic,
                'anons_pic' => $anonsPic,
                'name' => (string)$offerItem->name,
                'vendor' => (string)$offerItem->vendor,
                'barcode' => (string)$offerItem->barcode,
                'description' => (string)$offerItem->description,
            ], false);

            if ($offerModel->save()) {
                if ($isNewOffer) {
                    $this->saveParams($offerModel, $offerItem);
                    $this->saveCategories($offerModel, $offerItem);
                }
            }
        }
        return true;
    }

    private function saveParams($offerModel, $offerItem)
    {
        $paramRows = [];
        EOfferParams::deleteAll(['offer_id' => $offerModel->id]);

        foreach ($offerItem->param as $paramItem) {
            $temp = (array)$paramItem;

            $paramModel = new EOfferParams;
            $paramModel->setAttributes([
                'offer_id' => $offerModel->id,
                'name' => $temp['@attributes']['name'],
                'value' => $temp[0],
            ], false);

            if ($offerModel->validate()) {
                $paramRows[] = [
                    $paramModel->offer_id,
                    $paramModel->name,
                    $paramModel->value
                ];
            }
        }

        $this->batchInsert(
            EOfferParams::tableName(),
            ['offer_id', 'name', 'value'],
            $paramRows,
            ' ON DUPLICATE KEY UPDATE offer_id=offer_id, name=name, value=value'
        );
    }

    private function saveCategories($offerModel, $offerItem)
    {
        ECategoriesOffers::deleteAll(['offer_id' => $offerModel->id]);
        $categories = ECategories::find()
            ->select(['id'])
            ->where(['shop_id' => (array)$offerItem->categoryId])
            ->distinct()
            ->column();

        $dataRows = [];

        foreach ($categories as $category_id) {
            $dataRows[] = [
                $offerModel->id,
                $category_id,
            ];
        }

        $this->batchInsert(
            ECategoriesOffers::tableName(),
            ['offer_id', 'category_id'],
            $dataRows,
            ' ON DUPLICATE KEY UPDATE offer_id=offer_id, category_id=category_id'
        );
    }
}