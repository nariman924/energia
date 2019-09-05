<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model common\models\EOffers */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Eoffers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eoffers-view">

    <p>
        <?php echo Html::a(Yii::t('app', 'Update'), ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?php echo Html::a(Yii::t('app', 'Delete'), ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => Yii::t('app', 'Are you sure you want to delete this item?'),
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?php echo DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'available',
            'shop_url:url',
            'price',
            'currency',
            'qty',
            'vendor_code',
            'shop_anons_pic',
            'anons_pic',
            'name',
            'vendor',
            'description:ntext',
        ],
    ]) ?>

</div>
