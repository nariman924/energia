<?php
namespace common\components\loaders;

use common\models\EOfferPictures;
use common\models\EOffers;
use Yii;
use yii\db\Query;

class PicturesLoader extends BaseLoader
{
    public function load()
    {
        if (!isset($this->xmlData->shop->offers->offer)) {
            Yii::error('Не удалось распарсить XML', $this->logType);
            return false;
        }
        $localOffers = (new Query())
            ->select(['shop_id', 'id'])
            ->from(EOffers::tableName())
            ->indexBy('shop_id')
            ->all();

        $localPictures = (new Query())
            ->select(['CONCAT(offer_id, url)'])
            ->from(EOfferPictures::tableName())
            ->column();
        
        $dataRows = [];

        foreach ($this->xmlData->shop->offers->offer as $offerItem) {
            $attr = (array)$offerItem->attributes();
            $shopId = (int)$attr['@attributes']['id'];

            if (isset($localOffers[$shopId])) {
                $offerId = $localOffers[$shopId]['id'];
                $pictures = (array) $offerItem->picture;

                foreach ($pictures as $picture) {
                    $path = $this->saveImage($picture);
                    if (!\in_array($offerId . $path, $localPictures, true)) {
                        $dataRows[] = [
                            $offerId,
                            $picture,
                            $path
                        ];
                    }
                }
            }
        }

        $this->batchInsert(
            EOfferPictures::tableName(),
            ['offer_id', 'shop_url', 'url'],
            $dataRows
        );

        return true;
    }
}