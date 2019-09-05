<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\search\EOffersSearch */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="eoffers-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?php echo $form->field($model, 'id') ?>

    <?php echo $form->field($model, 'available') ?>

    <?php echo $form->field($model, 'shop_url') ?>

    <?php echo $form->field($model, 'price') ?>

    <?php echo $form->field($model, 'currency') ?>

    <?php // echo $form->field($model, 'qty') ?>

    <?php // echo $form->field($model, 'vendor_code') ?>

    <?php // echo $form->field($model, 'shop_anons_pic') ?>

    <?php // echo $form->field($model, 'anons_pic') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'vendor') ?>

    <?php // echo $form->field($model, 'description') ?>

    <div class="form-group">
        <?php echo Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?php echo Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
