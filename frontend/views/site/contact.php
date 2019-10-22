<?php
\frontend\assets\ContactAsset::register($this);

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Контакты';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Contact Info -->
<!-- Contact Form -->

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <?php if (Yii::$app->session->hasFlash('alert')):
                    $body = ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'body');
                    $options = ArrayHelper::getValue(Yii::$app->session->getFlash('alert'), 'options'); ?>
                    <div role="alert" class="alert <?= $options['class'] ?? ''?> alert-dismissible fade show">
                        <?= $body ?>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                <?php endif; ?>
                <div class="contact_form_container">
                    <div class="contact_form_title">Обратная связь</div>
                    <?php $form = ActiveForm::begin(['id' => 'contact-form']); ?>
                    <?php echo $form->field($model, 'name')->label(false)->textInput([
                        'id' => "contact_form_name",
                        'class' => 'input_field contact_form_name form-control',
                        'placeholder' => 'Ваше Имя',
                        'required' => 'required',
                    ]) ?>
                    <?php echo $form->field($model, 'email')->label(false)->textInput([
                        'id' => "contact_form_email",
                        'class' => 'input_field contact_form_email form-control',
                        'placeholder' => 'Email',
                        'required' => 'required',
                    ]) ?>
                    <?php echo $form->field($model, 'subject')->label(false)->textInput([
                        'id' => "contact_form_phone",
                        'class' => 'input_field contact_form_phone form-control',
                        'placeholder' => 'Телефон',
                    ]) ?>
                        <div class="contact_form_text">
                            <?php echo $form->field($model, 'body')->label(false)->textarea([
                                'rows' => 4,
                                'id' => "contact_form_message",
                                'class' => 'text_field contact_form_message',
                                'placeholder' => 'Сообщение',
                                'required' => 'required',
                            ]) ?>
                        </div>
                        <?= $form->field($model, 'verifyCode')->widget(Captcha::class, [
                            'options' => ['class' => 'form-control input_field'],
                            'template' => '<div class="row"><div class="col-lg-3">{image}</div><div class="col-lg-4">{input}</div></div>',
                        ]) ?>
                        <div class="contact_form_button">
                            <?= Html::submitButton(Yii::t('frontend', 'Submit'), ['class' => 'button contact_submit_button', 'name' => 'contact-button']) ?>
                        </div>
                    <?php ActiveForm::end(); ?>
                </div>
            </div>
        </div>
    </div>
    <div class="panel"></div>
</div>

