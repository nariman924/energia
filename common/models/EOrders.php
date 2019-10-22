<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "e_orders".
 *
 * @property int $id
 * @property int $shop_id
 * @property string $status_code
 * @property string $status_text
 * @property string $price
 * @property string $delivery_price
 * @property string $comment
 * @property int $paySystem
 * @property string $fio
 * @property string $email
 * @property string $phone
 * @property string $address
 * @property string $city
 * @property string $delivery
 * @property array $basket
 */
class EOrders extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'e_orders';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['shop_id', 'paySystem'], 'integer'],
            [['status_text', 'comment'], 'string'],
            [['price', 'delivery_price'], 'number'],
            [['basket'], 'safe'],
            [['status_code', 'fio', 'email', 'phone', 'city', 'delivery'], 'string', 'max' => 100],
            [['address'], 'string', 'max' => 1000],
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
            'status_code' => Yii::t('app', 'Status Code'),
            'status_text' => Yii::t('app', 'Status Text'),
            'price' => Yii::t('app', 'Price'),
            'delivery_price' => Yii::t('app', 'Delivery Price'),
            'comment' => Yii::t('app', 'Comment'),
            'paySystem' => Yii::t('app', 'Pay System'),
            'fio' => Yii::t('app', 'Fio'),
            'email' => Yii::t('app', 'Email'),
            'phone' => Yii::t('app', 'Phone'),
            'address' => Yii::t('app', 'Address'),
            'city' => Yii::t('app', 'City'),
            'delivery' => Yii::t('app', 'Delivery'),
            'basket' => Yii::t('app', 'Basket'),
        ];
    }

    /**
     * {@inheritdoc}
     * @return \common\models\query\EOrdersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \common\models\query\EOrdersQuery(get_called_class());
    }
}
