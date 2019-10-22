<?php
/**
 * Created by PhpStorm.
 * User: zein
 * Date: 7/4/14
 * Time: 2:01 PM
 */

namespace frontend\controllers;

use common\models\EOffers;
use common\models\Page;
use common\models\search\EOffersSearch;
use frontend\models\Cart;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\BadRequestHttpException;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CartController extends Controller
{
    public function actionIndex()
    {
        $items = Yii::$app->cart->getItems();

        return $this->render('index', compact('items', ''));
    }

    public function actionAdd()
    {
        $offerId = Yii::$app->request->post('offerId');
        $quantity = Yii::$app->request->post('quantity', 1);

        $cart = new Cart();
        $cart->setAttributes([
           'offerId' => $offerId,
           'quantity' => $quantity,
        ]);

        if ($cart->validate()) {
            \Yii::$app->cart->add(EOffers::findOne($offerId), $quantity);
        }

        Yii::$app->response->redirect('index');
    }

    public function actionClear()
    {
        Yii::$app->cart->clear();
        Yii::$app->response->redirect('index');
    }
}
