<?php

namespace frontend\controllers;

use common\models\EOffers;
use common\models\search\EOffersSearch;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CatalogController extends Controller
{
    public function actionIndex()
    {
        $searchModel = new EOffersSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams, $searchModel->formName());

        return $this->render('index', compact('dataProvider', 'searchModel'));
    }

    public function actionProduct($id)
    {
        $model = EOffers::findOne($id);
        if (!$model) {
            throw new NotFoundHttpException;
        }

        return $this->render('product', compact('model', ''));
    }
}
