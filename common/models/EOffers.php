<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "e_offers".
 *
 * @property int $id
 * @property int $available
 * @property string $shop_url
 * @property int $shop_id
 * @property string $price
 * @property string $currency
 * @property int $qty
 * @property string $vendor_code
 * @property string $shop_anons_pic
 * @property string $anons_pic
 * @property string $name
 * @property string $vendor
 * @property string $barcode
 * @property string $description
 *
 * @property ECategoriesOffers[] $eCategoriesOffers
 * @property EOfferParams[] $eOfferParams
 * @property EOfferPictures[] $eOfferPictures
 */
class EOffers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'e_offers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['available', 'shop_id', 'qty'], 'integer'],
            [['price'], 'number'],
            [['description'], 'string'],
            [['shop_url', 'barcode', 'vendor_code', 'shop_anons_pic', 'anons_pic', 'name', 'vendor'], 'string', 'max' => 1000],
            [['currency'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'available' => Yii::t('app', 'Available'),
            'shop_url' => Yii::t('app', 'Shop Url'),
            'price' => 'Цена',
            'currency' => 'Валюта',
            'qty' => 'Количество',
            'vendor_code' => Yii::t('app', 'Vendor Code'),
            'shop_anons_pic' => Yii::t('app', 'Shop Anons Pic'),
            'anons_pic' => Yii::t('app', 'Anons Pic'),
            'name' => 'Название',
            'vendor' => 'Производитель',
            'description' => 'Описание',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getECategoriesOffers()
    {
        return $this->hasMany(ECategoriesOffers::className(), ['offer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getECategories()
    {
        return $this->hasMany(ECategories::className(), ['id' => 'category_id'])->via('eCategoriesOffers');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEOfferParams()
    {
        return $this->hasMany(EOfferParams::className(), ['offer_id' => 'id']);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getEOfferPictures()
    {
        return $this->hasMany(EOfferPictures::className(), ['offer_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EOffersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EOffersQuery(get_called_class());
    }
}
