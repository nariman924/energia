<?php

/* @var $this \yii\web\View */
/* @var $content string */
use yii\helpers\Url;

$this->beginContent('@frontend/views/layouts/_clear.php');
$topCat = \common\models\ECategories::find()->getList();

?>
<div class="wrap">
    <?php echo $content ?>
</div>

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
                            <li><a href="<?= Url::toRoute('/catalog') ?>">Каталог</a></li>
                            <li><a href="<?= Url::toRoute('/page/delivery') ?>">Доставка</a></li>
                            <li><a href="<?= Url::toRoute('/page/warranty') ?>">Гарантия</a></li>
                            <li><a href="<?= Url::toRoute('/page/about') ?>">О нас</a></li>
<!--                            <li><a href="--><?//= Url::toRoute('/article') ?><!--">Статьи</a></li>-->
                            <li><a href="<?= Url::toRoute('/site/contact') ?>">Контакты</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-lg-3">
                    <div class="footer_column">
                        <div class="footer_title">Категории</div>
                        <ul class="footer_list">
                            <?php

                            foreach ($topCat as $item) { ?>
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