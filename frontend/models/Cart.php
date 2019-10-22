<?php

namespace frontend\models;

use common\models\EOffers;
use Yii;
use yii\base\Model;

/**
 * Cart is the model
 */
class Cart extends Model
{
    public $offerId;
    public $quantity;

    /**
     * @return array the validation rules.
     */
    public function rules()
    {
        return [
            [['offerId', 'quantity'], 'integer'],
            [['offerId', 'quantity'], 'required'],
            [['offerId'], 'validateOfferId'],
        ];
    }

    public function validateOfferId($attribute, $params)
    {
        $offer = EOffers::findOne($this->offerId);

        if (!$offer) {
            $this->addError($attribute, 'Товар не найден!');
            return false;
        }
        if (!$offer->available) {
            $this->addError($attribute, 'Данного товара нет в наличии!');
            return false;
        }

        return true;
    }
}
