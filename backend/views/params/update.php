<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EParams */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Eparams',
]) . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Eparams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="eparams-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
