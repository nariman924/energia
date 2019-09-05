<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model common\models\ECategories */

$this->title = Yii::t('app', 'Create {modelClass}', [
    'modelClass' => 'Ecategories',
]);
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Ecategories'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ecategories-create">

    <?php echo $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
