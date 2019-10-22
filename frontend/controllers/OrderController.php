<?php

namespace frontend\controllers;

use common\models\EOffers;
use common\models\Page;
use common\models\search\EOffersSearch;
use Yii;
use yii\data\ActiveDataProvider;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class OrderController extends Controller
{
    public function actionIndex()
    {
        $model = new EOffers();
        if (!$model) {
            throw new NotFoundHttpException;
        }

        return $this->render('index', compact('model', ''));
    }
}
