<?php
use common\models\ECategories;
use yii\helpers\Url;


$topCat = ECategories::find()->getList();

function drawMenuItems($category)
{
    $childs = ECategories::find()->getList($category['shop_id']);

    if ($childs) {
        echo '<li class="hassubs"><a href="/#">' . $category['name'] .
            '<i class="fa fa-chevron-right ml-auto"></i></a><ul style="width: inherit!important;">';

        foreach ($childs as $item) {
            drawMenuItems($item);
        }
        echo '</ul></li>';
    } else {
        echo '<li><a href="/#">' . $category['name'] . '<i class="fa fa-chevron-right ml-auto"></i></a></li>';
    }
}

$this->beginContent('@frontend/views/layouts/base.php'); ?>

<div class="super_container">

    <!-- Header -->

    <header class="header">

        <!-- Top Bar -->

        <div class="top_bar">
            <div class="container">
                <div class="row">
                    <div class="col d-flex flex-row">
                        <div class="top_bar_contact_item"><div class="top_bar_icon">
                                <img src="/images/phone.png" alt=""></div>
                            <?= Yii::$app->keyStorage->get('phone'); ?>
                        </div>
                        <div class="top_bar_contact_item">
                            <div class="top_bar_icon"><img src="/images/mail.png" alt=""></div>
                            <a href="/mailto:<?= Yii::$app->keyStorage->get('email'); ?>">
                                <?= Yii::$app->keyStorage->get('email'); ?>
                            </a>
                        </div>
                        <div class="top_bar_content ml-auto">
                            <div class="top_bar_user">
                                <div class="user_icon"><img src="/images/user.svg" alt=""></div>
                                <div><a href="<?= Url::toRoute('/user/sign-in/signup') ?>">Регистрация</a></div>
                                <div><a href="<?= Url::toRoute('/user/sign-in/login') ?>">Вход</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Header Main -->

        <div class="header_main">
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo"><a href="<?= Yii::$app->homeUrl ?>">ИМ Энергия</a></div>
                        </div>
                    </div>
                    <!-- Search -->
                    <div class="col-lg-5 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix">
                                        <input type="search" required="required" class="header_search_input" placeholder="Поиск...">
                                        <button type="submit" class="header_search_button trans_300" value="Submit"><img src="/images/search.png" alt=""></button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Wishlist -->
                    <div class="col-lg-4 col-9 order-lg-3 order-2 text-lg-left text-right">
                        <div class="wishlist_cart d-flex flex-row align-items-center justify-content-end">
                            <div class="wishlist d-flex flex-row align-items-center justify-content-end">
                                <div class="wishlist_icon"><img src="/images/heart.png" alt=""></div>
                                <div class="wishlist_content">
                                    <div class="wishlist_text"><a href="/#">Избранное</a></div>
                                    <div class="wishlist_count">115</div>
                                </div>
                            </div>

                            <!-- Cart -->
                            <div class="cart">
                                <div class="cart_container d-flex flex-row align-items-center justify-content-end">
                                    <div class="cart_icon">
                                        <img src="/images/cart.png" alt="">
                                        <div class="cart_count"><span>10</span></div>
                                    </div>
                                    <div class="cart_content">
                                        <div class="cart_text"><a href="/#">Корзина</a></div>
                                        <div class="cart_price">$85</div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Main Navigation -->

        <nav class="main_nav">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="main_nav_content d-flex flex-row">

                            <!-- Categories Menu -->

                            <div class="cat_menu_container">
                                <div class="cat_menu_title d-flex flex-row align-items-center justify-content-start">
                                    <div class="cat_burger"><span></span><span></span><span></span></div>
                                    <div class="cat_menu_text">категории</div>
                                </div>

                                <ul class="cat_menu">
                                    <?php foreach ($topCat as $item) {
                                        drawMenuItems($item);
                                    }?>
                                </ul>
                            </div>

                            <!-- Main Nav Menu -->

                            <div class="main_nav_menu ml-auto">
                                <ul class="standard_dropdown main_nav_dropdown">
                                    <li><a href="<?= Yii::$app->homeUrl ?>">Главная<i class="fa fa-chevron-down"></i></a></li>
                                    <li><a href="/#">Каталог<i class="fa fa-chevron-down"></i></a></li>
                                    <li><a href="/#">Доставка<i class="fa fa-chevron-down"></i></a></li>
                                    <li><a href="/#">Гарантия<i class="fa fa-chevron-down"></i></a></li>
                                    <li><a href="/#">О нас<i class="fa fa-chevron-down"></i></a></li>
                                    <li><a href="/blog.html">Статьи<i class="fa fa-chevron-down"></i></a></li>
                                    <li><a href="/contact.html">Контакты<i class="fa fa-chevron-down"></i></a></li>
                                </ul>
                            </div>

                            <!-- Menu Trigger -->

                            <div class="menu_trigger_container ml-auto">
                                <div class="menu_trigger d-flex flex-row align-items-center justify-content-end">
                                    <div class="menu_burger">
                                        <div class="menu_trigger_text">menu</div>
                                        <div class="cat_burger menu_burger_inner"><span></span><span></span><span></span></div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </nav>

        <!-- Menu -->

        <div class="page_menu">
            <div class="container">
                <div class="row">
                    <div class="col">

                        <div class="page_menu_content">

                            <div class="page_menu_search">
                                <form action="#">
                                    <input type="search" required="required" class="page_menu_search_input" placeholder="Поиск...">
                                </form>
                            </div>
                            <ul class="page_menu_nav">
                                <li class="page_menu_item">
                                    <a href="<?= Yii::$app->homeUrl ?>">Главная<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item">
                                    <a href="<?= Yii::$app->homeUrl ?>">Каталог<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item">
                                    <a href="<?= Yii::$app->homeUrl ?>">Доставка<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item">
                                    <a href="<?= Yii::$app->homeUrl ?>">Гарантия<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item">
                                    <a href="<?= Yii::$app->homeUrl ?>">О нас<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item">
                                    <a href="<?= Yii::$app->homeUrl ?>">Контакты<i class="fa fa-angle-down"></i></a>
                                </li>
                            </ul>

                            <div class="menu_contact">
                                <div class="menu_contact_item">
                                    <div class="menu_contact_icon">
                                        <img src="/images/phone_white.png" alt="">
                                    </div><?= Yii::$app->keyStorage->get('phone'); ?>
                                </div>
                                <div class="menu_contact_item">
                                    <div class="menu_contact_icon">
                                        <img src="/images/mail_white.png" alt="">
                                    </div>
                                    <a href="/mailto:<?= Yii::$app->keyStorage->get('email'); ?>"><?= Yii::$app->keyStorage->get('email'); ?></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <?php echo $content ?>

</div>
<?php $this->endContent() ?>