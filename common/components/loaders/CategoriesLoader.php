<?php
namespace common\components\loaders;

use common\models\ECategories;
use Yii;

class CategoriesLoader extends BaseLoader
{
    public function load()
    {
        if (!isset($this->xmlData->shop->categories->category)) {
            Yii::error('Не удалось распарсить XML', $this->logType);
            return false;
        }
        $dataRows = [];

        foreach ($this->xmlData->shop->categories->category as $element) {
            $temp = (array)$element;

            $tempModel = new ECategories();
            $tempModel->setAttributes([
                'shop_id' => $temp['@attributes']['id'],
                'shop_parent_id' => $temp['@attributes']['parentId'] ?? null,
                'name' => $temp[0]
            ], false);

            if ($tempModel->validate()) {
                $dataRows[] = [
                    $tempModel->shop_id,
                    $tempModel->shop_parent_id,
                    $tempModel->name
                ];
            }
        }
        $this->batchInsert(
            ECategories::tableName(),
            ['shop_id', 'shop_parent_id', 'name'],
            $dataRows,
            ' ON DUPLICATE KEY UPDATE shop_parent_id=shop_parent_id, name=name'
        );

        return true;
    }
}