<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model common\models\ECategories */

$this->title = Yii::t('app', 'Update {modelClass}: ', [
    'modelClass' => 'Ecategories',
]) . ' ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ecategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = Yii::t('app', 'Update');
?>
<div class="ecategories-update">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
