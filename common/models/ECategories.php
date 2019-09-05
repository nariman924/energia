<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "e_categories".
 *
 * @property int $id
 * @property int $shop_id
 * @property int $shop_parent_id
 * @property string $name
 *
 * @property ECategoriesOffers[] $eCategoriesOffers
 */
class ECategories extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'e_categories';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shop_id', 'shop_parent_id'], 'integer'],
            [['name'], 'string', 'max' => 1000],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'shop_id' => Yii::t('app', 'Shop ID'),
            'shop_parent_id' => Yii::t('app', 'Shop Parent ID'),
            'name' => Yii::t('app', 'Name'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getECategoriesOffers()
    {
        return $this->hasMany(ECategoriesOffers::className(), ['category_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\ECategoriesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ECategoriesQuery(get_called_class());
    }
}
