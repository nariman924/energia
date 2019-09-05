<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\EOffersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Eoffers');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eoffers-index">

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?php echo Html::a(Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Eoffers',
]), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'available',
            'shop_url:url',
            'price',
            'currency',
            // 'qty',
            // 'vendor_code',
            // 'shop_anons_pic',
            // 'anons_pic',
            // 'name',
            // 'vendor',
            // 'description:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
