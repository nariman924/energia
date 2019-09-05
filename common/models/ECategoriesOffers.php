<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "e_categories_offers".
 *
 * @property int $id
 * @property int $category_id
 * @property int $offer_id
 *
 * @property ECategories $category
 * @property EOffers $offer
 */
class ECategoriesOffers extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'e_categories_offers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['category_id', 'offer_id'], 'integer'],
            [['category_id'], 'exist', 'skipOnError' => true, 'targetClass' => ECategories::className(), 'targetAttribute' => ['category_id' => 'id']],
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
            'category_id' => Yii::t('app', 'Category ID'),
            'offer_id' => Yii::t('app', 'Offer ID'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getCategory()
    {
        return $this->hasOne(ECategories::className(), ['id' => 'category_id']);
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
     * @return \common\models\query\ECategoriesOffersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\ECategoriesOffersQuery(get_called_class());
    }
}
