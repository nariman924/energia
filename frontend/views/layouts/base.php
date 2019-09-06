<?php

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
<div class="wrap">
    <?php echo $content ?>
</div>
    <?php /*
    <!-- Newsletter -->
    <div class="newsletter">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="newsletter_container d-flex flex-lg-row flex-column align-items-lg-center align-items-center justify-content-lg-start justify-content-center">
                        <div class="newsletter_title_container">
                            <div class="newsletter_icon"><img src="/images/send.png" alt=""></div>
                            <div class="newsletter_title">Sign up for Newsletter</div>
                            <div class="newsletter_text"><p>...and receive %20 coupon for first shopping.</p></div>
                        </div>
                        <div class="newsletter_content clearfix">
                            <form action="#" class="newsletter_form">
                                <input type="email" class="newsletter_input" required="required" placeholder="Enter your email address">
                                <button class="newsletter_button">Subscribe</button>
                            </form>
                            <div class="newsletter_unsubscribe_link"><a href="/#">unsubscribe</a></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    */ ?>
    <!-- Footer -->

    <footer class="footer">
        <div class="container">
            <div class="row">

                <div class="col-lg-3 footer_col">
                    <div class="footer_column footer_contact">
                        <div class="logo_container">
                            <div class="logo"><a href="/#">ИМ Энерния</a></div>
                        </div>
                        <div class="footer_phone"><?= Yii::$app->keyStorage->get('phone'); ?></div>
                        <div class="footer_contact_text"><?= Yii::$app->keyStorage->get('email'); ?></div>
                        <div class="footer_contact_text"><?= Yii::$app->keyStorage->get('address'); ?></div>
                    </div>
                </div>

                <div class="offset-lg-4 col-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Меню</div>
                        <ul class="footer_list">
                            <li><a href="<?= Yii::$app->homeUrl ?>">Главная</a></li>
                            <li><a href="/#">Каталог</a></li>
                            <li><a href="/#">Доставка</a></li>
                            <li><a href="/#">Гарантия</a></li>
                            <li><a href="/#">О нас</a></li>
                            <li><a href="/blog.html">Статьи</a></li>
                            <li><a href="/contact.html">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer_column">
                        <div class="footer_title">Категории</div>
                        <ul class="footer_list">
                            <?php foreach (\common\models\ECategories::find()->getList() as $item) { ?>
                                <li>
                                    <a data-toggle="tooltip" title="<?= $item['name'] ?>" href="/#">
                                        <?= $item['name'] ?>
                                    </a>
                                </li>
                            <?php } ?>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </footer>
    <!-- Copyright -->
    <div class="copyright">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="copyright_container d-flex flex-sm-row flex-column align-items-center justify-content-start">
                        <div class="copyright_content">
                            Copyright &copy <?= date('Y') ?> All rights reserved
                        </div>
                        <div class="logos ml-sm-auto">
                            <ul class="logos_list">
                                <li><a href="/#"><img src="/images/logos_1.png" alt=""></a></li>
                                <li><a href="/#"><img src="/images/logos_2.png" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endContent() ?>