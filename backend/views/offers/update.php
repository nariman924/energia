<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\EOffers */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Eoffers',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Eoffers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="eoffers-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
