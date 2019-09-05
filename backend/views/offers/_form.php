<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\EOffers */
/* @var $form yii\bootstrap\ActiveForm */
?>

<div class="eoffers-form">

    <?php $form = ActiveForm::begin(); ?>

    <?php echo $form->errorSummary($model); ?>

    <?php echo $form->field($model, 'available')->textInput() ?>

    <?php echo $form->field($model, 'shop_url')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'currency')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'qty')->textInput() ?>

    <?php echo $form->field($model, 'vendor_code')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'shop_anons_pic')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'anons_pic')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'vendor')->textInput(['maxlength' => true]) ?>

    <?php echo $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?php echo Html::submitButton($model->isNewRecord ? Yii::t('app', 'Create') : Yii::t('app', 'Update'), ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
