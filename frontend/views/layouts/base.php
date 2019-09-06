<?php

use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;

/* @var $this \yii\web\View */
/* @var $content string */

$this->beginContent('@frontend/views/layouts/_clear.php')
?>
<div class="wrap">
<!--    --><?php
//    NavBar::begin([
//        'brandLabel' => Yii::$app->name,
//        'brandUrl' => Yii::$app->homeUrl,
//        'options' => [
//            'class' => 'navbar-inverse navbar-fixed-top',
//        ],
//    ]); ?>
<!--    --><?php //echo Nav::widget([
//        'options' => ['class' => 'navbar-nav navbar-right'],
//        'items' => [
//            ['label' => Yii::t('frontend', 'Home'), 'url' => ['/site/index']],
//            ['label' => Yii::t('frontend', 'About'), 'url' => ['/page/view', 'slug'=>'about']],
//            ['label' => Yii::t('frontend', 'Articles'), 'url' => ['/article/index']],
//            ['label' => Yii::t('frontend', 'Contact'), 'url' => ['/site/contact']],
//            ['label' => Yii::t('frontend', 'Signup'), 'url' => ['/user/sign-in/signup'], 'visible'=>Yii::$app->user->isGuest],
//            ['label' => Yii::t('frontend', 'Login'), 'url' => ['/user/sign-in/login'], 'visible'=>Yii::$app->user->isGuest],
//            [
//                'label' => Yii::$app->user->isGuest ? '' : Yii::$app->user->identity->getPublicIdentity(),
//                'visible'=>!Yii::$app->user->isGuest,
//                'items'=>[
//                    [
//                        'label' => Yii::t('frontend', 'Settings'),
//                        'url' => ['/user/default/index']
//                    ],
//                    [
//                        'label' => Yii::t('frontend', 'Backend'),
//                        'url' => Yii::getAlias('@backendUrl'),
//                        'visible'=>Yii::$app->user->can('manager')
//                    ],
//                    [
//                        'label' => Yii::t('frontend', 'Logout'),
//                        'url' => ['/user/sign-in/logout'],
//                        'linkOptions' => ['data-method' => 'post']
//                    ]
//                ]
//            ],
//            [
//                'label'=>Yii::t('frontend', 'Language'),
//                'items'=>array_map(function ($code) {
//                    return [
//                        'label' => Yii::$app->params['availableLocales'][$code],
//                        'url' => ['/site/set-locale', 'locale'=>$code],
//                        'active' => Yii::$app->language === $code
//                    ];
//                }, array_keys(Yii::$app->params['availableLocales']))
//            ]
//        ]
//    ]); ?>
<!--    --><?php //NavBar::end(); ?>

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
                            <div class="logo"><a href="/#">OneTech</a></div>
                        </div>
                        <div class="footer_title">Got Question? Call Us 24/7</div>
                        <div class="footer_phone">+38 068 005 3570</div>
                        <div class="footer_contact_text">
                            <p>17 Princess Road, London</p>
                            <p>Grester London NW18JR, UK</p>
                        </div>
                        <div class="footer_social">
                            <ul>
                                <li><a href="/#"><i class="fa fa-facebook-f"></i></a></li>
                                <li><a href="/#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="/#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="/#"><i class="fa fa-google"></i></a></li>
                                <li><a href="/#"><i class="fa fa-vimeo-v"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>

                <div class="col-lg-2 offset-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Find it Fast</div>
                        <ul class="footer_list">
                            <li><a href="/#">Computers & Laptops</a></li>
                            <li><a href="/#">Cameras & Photos</a></li>
                            <li><a href="/#">Hardware</a></li>
                            <li><a href="/#">Smartphones & Tablets</a></li>
                            <li><a href="/#">TV & Audio</a></li>
                        </ul>
                        <div class="footer_subtitle">Gadgets</div>
                        <ul class="footer_list">
                            <li><a href="/#">Car Electronics</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <ul class="footer_list footer_list_2">
                            <li><a href="/#">Video Games & Consoles</a></li>
                            <li><a href="/#">Accessories</a></li>
                            <li><a href="/#">Cameras & Photos</a></li>
                            <li><a href="/#">Hardware</a></li>
                            <li><a href="/#">Computers & Laptops</a></li>
                        </ul>
                    </div>
                </div>

                <div class="col-lg-2">
                    <div class="footer_column">
                        <div class="footer_title">Customer Care</div>
                        <ul class="footer_list">
                            <li><a href="/#">My Account</a></li>
                            <li><a href="/#">Order Tracking</a></li>
                            <li><a href="/#">Wish List</a></li>
                            <li><a href="/#">Customer Services</a></li>
                            <li><a href="/#">Returns / Exchange</a></li>
                            <li><a href="/#">FAQs</a></li>
                            <li><a href="/#">Product Support</a></li>
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
                        <div class="copyright_content"><!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                            Copyright &copy;<script>document.write(new Date().getFullYear());</script> All rights reserved | This template is made with <i class="fa fa-heart" aria-hidden="true"></i> by <a href="/https://colorlib.com" target="_blank">Colorlib</a>
                            <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
                        </div>
                        <div class="logos ml-sm-auto">
                            <ul class="logos_list">
                                <li><a href="/#"><img src="/images/logos_1.png" alt=""></a></li>
                                <li><a href="/#"><img src="/images/logos_2.png" alt=""></a></li>
                                <li><a href="/#"><img src="/images/logos_3.png" alt=""></a></li>
                                <li><a href="/#"><img src="/images/logos_4.png" alt=""></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?php $this->endContent() ?>