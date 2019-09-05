<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\EOffers */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Eoffers',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Eoffers'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="eoffers-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
