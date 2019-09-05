<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EParams */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Eparams',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Eparams'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eparams-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
