<?php
\frontend\assets\ContactAsset::register($this);

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\captcha\Captcha;

/* @var $this yii\web\View */
/* @var $form yii\widgets\ActiveForm */
/* @var $model \frontend\models\ContactForm */

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
?>
<!-- Contact Info -->

<div class="contact_info">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="contact_info_container d-flex flex-lg-row flex-column justify-content-between align-items-between">

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="/images/contact_1.png" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Phone</div>
                            <div class="contact_info_text">+38 068 005 3570</div>
                        </div>
                    </div>

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="/images/contact_2.png" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Email</div>
                            <div class="contact_info_text">fastsales@gmail.com</div>
                        </div>
                    </div>

                    <!-- Contact Item -->
                    <div class="contact_info_item d-flex flex-row align-items-center justify-content-start">
                        <div class="contact_info_image"><img src="/images/contact_3.png" alt=""></div>
                        <div class="contact_info_content">
                            <div class="contact_info_title">Address</div>
                            <div class="contact_info_text">10 Suffolk at Soho, London, UK</div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<!-- Contact Form -->

<div class="contact_form">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
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

