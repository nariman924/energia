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
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

class CatalogController extends Controller
{
    public function actionIndex($slug)
    {
        return $this->render('index');
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
