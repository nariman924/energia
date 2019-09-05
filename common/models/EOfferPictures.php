<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "e_offer_pictures".
 *
 * @property int $id
 * @property int $offer_id
 * @property string $shop_url
 * @property string $url
 *
 * @property EOffers $offer
 */
class EOfferPictures extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'e_offer_pictures';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['offer_id'], 'integer'],
            [['shop_url', 'url'], 'string', 'max' => 1000],
            [['offer_id'], 'exist', 'skipOnError' => true, 'targetClass' => EOffers::className(), 'targetAttribute' => ['offer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'offer_id' => Yii::t('app', 'Offer ID'),
            'shop_url' => Yii::t('app', 'Shop Url'),
            'url' => Yii::t('app', 'Url'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getOffer()
    {
        return $this->hasOne(EOffers::className(), ['id' => 'offer_id']);
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EOfferPicturesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EOfferPicturesQuery(get_called_class());
    }
}
