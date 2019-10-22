<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EOrders */

$this->title = Yii::t('app', 'Create E Orders');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'E Orders'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eorders-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
