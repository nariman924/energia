<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "e_offer_params".
 *
 * @property int $id
 * @property int $offer_id
 * @property string $name
 * @property string $value
 *
 * @property EOffers $offer
 */
class EOfferParams extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'e_offer_params';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['offer_id'], 'integer'],
            [['name', 'value'], 'string', 'max' => 1000],
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
            'name' => Yii::t('app', 'Name'),
            'value' => Yii::t('app', 'Value'),
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
     * @return \common\models\query\EOfferParamsQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EOfferParamsQuery(get_called_class());
    }
}
