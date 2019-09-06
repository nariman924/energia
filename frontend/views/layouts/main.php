<?php
use common\models\ECategories;
use yii\helpers\StringHelper;
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

$this->beginContent('@frontend/views/layouts/base.php') ?>

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
                    <div class="col-lg-2 col-sm-3 col-3 order-1">
                        <div class="logo_container">
                            <div class="logo"><a href="<?= Yii::$app->homeUrl ?>">Энергия</a></div>
                        </div>
                    </div>
                    <!-- Search -->
                    <div class="col-lg-6 col-12 order-lg-2 order-3 text-lg-left text-right">
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form action="#" class="header_search_form clearfix">
                                        <input type="search" required="required" class="header_search_input" placeholder="Найти продукт...">
                                        <div class="custom_dropdown">
                                            <div class="custom_dropdown_list">
                                                <span class="custom_dropdown_placeholder clc">Все категории</span>
                                                <i class="fa fa-chevron-down"></i>
                                                <ul class="custom_list clc">
                                                    <?php foreach ($topCat as $item) { ?>
                                                        <li>
                                                            <a data-toggle="tooltip" title="<?= $item['name'] ?>" class="clc" href="/#">
                                                                <?= StringHelper::truncate($item['name'],14,'...') ?>
                                                            </a>
                                                        </li>
                                                    <?php } ?>
                                                </ul>
                                            </div>
                                        </div>
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
                                    <li><a href="/#">Главная<i class="fa fa-chevron-down"></i></a></li>
                                    <li class="hassubs">
                                        <a href="/#">Super Deals<i class="fa fa-chevron-down"></i></a>
                                        <ul>
                                            <li>
                                                <a href="/#">Menu Item<i class="fa fa-chevron-down"></i></a>
                                                <ul>
                                                    <li><a href="/#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                                    <li><a href="/#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                                    <li><a href="/#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="/#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                            <li><a href="/#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                            <li><a href="/#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="/#">Featured Brands<i class="fa fa-chevron-down"></i></a>
                                        <ul>
                                            <li>
                                                <a href="/#">Menu Item<i class="fa fa-chevron-down"></i></a>
                                                <ul>
                                                    <li><a href="/#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                                    <li><a href="/#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                                    <li><a href="/#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                                </ul>
                                            </li>
                                            <li><a href="/#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                            <li><a href="/#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                            <li><a href="/#">Menu Item<i class="fa fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li class="hassubs">
                                        <a href="/#">Pages<i class="fa fa-chevron-down"></i></a>
                                        <ul>
                                            <li><a href="/shop.html">Shop<i class="fa fa-chevron-down"></i></a></li>
                                            <li><a href="/product.html">Product<i class="fa fa-chevron-down"></i></a></li>
                                            <li><a href="/blog.html">Blog<i class="fa fa-chevron-down"></i></a></li>
                                            <li><a href="/blog_single.html">Blog Post<i class="fa fa-chevron-down"></i></a></li>
                                            <li><a href="/regular.html">Regular Post<i class="fa fa-chevron-down"></i></a></li>
                                            <li><a href="/cart.html">Cart<i class="fa fa-chevron-down"></i></a></li>
                                            <li><a href="/contact.html">Contact<i class="fa fa-chevron-down"></i></a></li>
                                        </ul>
                                    </li>
                                    <li><a href="/blog.html">Blog<i class="fa fa-chevron-down"></i></a></li>
                                    <li><a href="/contact.html">Contact<i class="fa fa-chevron-down"></i></a></li>
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
                                    <input type="search" required="required" class="page_menu_search_input" placeholder="Search for products...">
                                </form>
                            </div>
                            <ul class="page_menu_nav">
                                <li class="page_menu_item has-children">
                                    <a href="/#">Language<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="/#">English<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="/#">Italian<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="/#">Spanish<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="/#">Japanese<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="/#">Currency<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="/#">US Dollar<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="/#">EUR Euro<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="/#">GBP British Pound<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="/#">JPY Japanese Yen<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item">
                                    <a href="/#">Home<i class="fa fa-angle-down"></i></a>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="/#">Super Deals<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="/#">Super Deals<i class="fa fa-angle-down"></i></a></li>
                                        <li class="page_menu_item has-children">
                                            <a href="/#">Menu Item<i class="fa fa-angle-down"></i></a>
                                            <ul class="page_menu_selection">
                                                <li><a href="/#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="/#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="/#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                                <li><a href="/#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                            </ul>
                                        </li>
                                        <li><a href="/#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="/#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="/#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="/#">Featured Brands<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="/#">Featured Brands<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="/#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="/#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="/#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item has-children">
                                    <a href="/#">Trending Styles<i class="fa fa-angle-down"></i></a>
                                    <ul class="page_menu_selection">
                                        <li><a href="/#">Trending Styles<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="/#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="/#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                        <li><a href="/#">Menu Item<i class="fa fa-angle-down"></i></a></li>
                                    </ul>
                                </li>
                                <li class="page_menu_item"><a href="/blog.html">blog<i class="fa fa-angle-down"></i></a></li>
                                <li class="page_menu_item"><a href="/contact.html">contact<i class="fa fa-angle-down"></i></a></li>
                            </ul>

                            <div class="menu_contact">
                                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="/images/phone_white.png" alt=""></div>+38 068 005 3570</div>
                                <div class="menu_contact_item"><div class="menu_contact_icon"><img src="/images/mail_white.png" alt=""></div><a href="/mailto:fastsales@gmail.com">fastsales@gmail.com</a></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </header>

    <!-- Banner -->

    <div class="banner">
        <div class="banner_background" style="background-image:url(images/banner_background.jpg)"></div>
        <div class="container fill_height">
            <div class="row fill_height">
                <div class="banner_product_image"><img src="/images/device-3.png" alt=""></div>
                <div class="col-lg-8 offset-lg-4 fill_height">
                    <div class="banner_content">
                        <h1 class="banner_text">Интернет магазин электрооборудования</h1>
                        <div class="banner_price"><span>$530</span>$460</div>
                        <div class="banner_product_name">Apple Iphone 6s</div>
                        <div class="button banner_button"><a href="/#">Shop Now</a></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Characteristics -->

    <div class="characteristics">
        <div class="container">
            <div class="row">

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="/images/char_1.png" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="/images/char_2.png" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="/images/char_3.png" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>

                <!-- Char. Item -->
                <div class="col-lg-3 col-md-6 char_col">

                    <div class="char_item d-flex flex-row align-items-center justify-content-start">
                        <div class="char_icon"><img src="/images/char_4.png" alt=""></div>
                        <div class="char_content">
                            <div class="char_title">Free Delivery</div>
                            <div class="char_subtitle">from $50</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Hot New Arrivals -->

    <div class="new_arrivals">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3 class="reviews_title">Hot New Arrivals</h3>
                    <!-- Product Panel -->
                    <div class="product_panel panel active">
                        <div class="arrivals_slider slider">
                            <!-- Slider Item -->
                            <div class="arrivals_slider_item">
                                <div class="border_active"></div>
                                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="/images/new_1.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225</div>
                                        <div class="product_name"><div><a href="/product.html">Gembird SPK-103</a></div></div>
                                        <div class="product_extras">

                                            <button class="product_cart_button">Add to Cart</button>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fa fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount"></li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Slider Item -->
                            <div class="arrivals_slider_item">
                                <div class="border_active"></div>
                                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="/images/new_2.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$379</div>
                                        <div class="product_name"><div><a href="/product.html">Canon IXUS 175...</a></div></div>
                                        <div class="product_extras">

                                            <button class="product_cart_button">Add to Cart</button>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fa fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount"></li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Slider Item -->
                            <div class="arrivals_slider_item">
                                <div class="border_active"></div>
                                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="/images/new_3.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$379</div>
                                        <div class="product_name"><div><a href="/product.html">Huawei MediaPad...</a></div></div>
                                        <div class="product_extras">

                                            <button class="product_cart_button">Add to Cart</button>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fa fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount"></li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Slider Item -->
                            <div class="arrivals_slider_item">
                                <div class="border_active"></div>
                                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="/images/new_4.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225</div>
                                        <div class="product_name"><div><a href="/product.html">Huawei MediaPad...</a></div></div>
                                        <div class="product_extras">

                                            <button class="product_cart_button">Add to Cart</button>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fa fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount"></li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Slider Item -->
                            <div class="arrivals_slider_item">
                                <div class="border_active"></div>
                                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="/images/new_5.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225</div>
                                        <div class="product_name"><div><a href="/product.html">Huawei MediaPad...</a></div></div>
                                        <div class="product_extras">

                                            <button class="product_cart_button">Add to Cart</button>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fa fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount"></li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Slider Item -->
                            <div class="arrivals_slider_item">
                                <div class="border_active"></div>
                                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="/images/new_1.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225</div>
                                        <div class="product_name"><div><a href="/product.html">Gembird SPK-103</a></div></div>
                                        <div class="product_extras">

                                            <button class="product_cart_button">Add to Cart</button>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fa fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount"></li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Slider Item -->
                            <div class="arrivals_slider_item">
                                <div class="border_active"></div>
                                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="/images/new_2.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$379</div>
                                        <div class="product_name"><div><a href="/product.html">Canon IXUS 175...</a></div></div>
                                        <div class="product_extras">

                                            <button class="product_cart_button">Add to Cart</button>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fa fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount"></li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Slider Item -->
                            <div class="arrivals_slider_item">
                                <div class="border_active"></div>
                                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="/images/new_6.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$379</div>
                                        <div class="product_name"><div><a href="/product.html">Huawei MediaPad...</a></div></div>
                                        <div class="product_extras">

                                            <button class="product_cart_button">Add to Cart</button>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fa fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount"></li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Slider Item -->
                            <div class="arrivals_slider_item">
                                <div class="border_active"></div>
                                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="/images/new_7.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$379</div>
                                        <div class="product_name"><div><a href="/product.html">Huawei MediaPad...</a></div></div>
                                        <div class="product_extras">

                                            <button class="product_cart_button">Add to Cart</button>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fa fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount"></li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Slider Item -->
                            <div class="arrivals_slider_item">
                                <div class="border_active"></div>
                                <div class="product_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="product_image d-flex flex-column align-items-center justify-content-center"><img src="/images/new_8.jpg" alt=""></div>
                                    <div class="product_content">
                                        <div class="product_price">$225</div>
                                        <div class="product_name"><div><a href="/product.html">Huawei MediaPad...</a></div></div>
                                        <div class="product_extras">

                                            <button class="product_cart_button">Add to Cart</button>
                                        </div>
                                    </div>
                                    <div class="product_fav"><i class="fa fa-heart"></i></div>
                                    <ul class="product_marks">
                                        <li class="product_mark product_discount"></li>
                                        <li class="product_mark product_new">new</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="arrivals_slider_dots_cover"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Banner -->

    <div class="banner_2">
        <div class="banner_2_background" style="background-image:url(images/banner_2_background.jpg)"></div>
        <div class="banner_2_container">
            <div class="banner_2_dots"></div>
            <!-- Banner 2 Slider -->

            <div class="owl-carousel owl-theme banner_2_slider">

                <!-- Banner 2 Slider Item -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">Laptops</div>
                                        <div class="banner_2_title">MacBook Air 13</div>
                                        <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
                                        <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="button banner_2_button"><a href="/#">Explore</a></div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img style="max-width:100%; max-height:100%; width:auto; height:auto" src="/images/device-4.png" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner 2 Slider Item -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">Laptops</div>
                                        <div class="banner_2_title">MacBook Air 13</div>
                                        <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
                                        <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="button banner_2_button"><a href="/#">Explore</a></div>
                                    </div>
                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img style="max-width:100%; max-height:100%; width:auto; height:auto" src="/images/device-1.png" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Banner 2 Slider Item -->
                <div class="owl-item">
                    <div class="banner_2_item">
                        <div class="container fill_height">
                            <div class="row fill_height">
                                <div class="col-lg-4 col-md-6 fill_height">
                                    <div class="banner_2_content">
                                        <div class="banner_2_category">Laptops</div>
                                        <div class="banner_2_title">MacBook Air 13</div>
                                        <div class="banner_2_text">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Maecenas fermentum laoreet.</div>
                                        <div class="rating_r rating_r_4 banner_2_rating"><i></i><i></i><i></i><i></i><i></i></div>
                                        <div class="button banner_2_button"><a href="/#">Explore</a></div>
                                    </div>

                                </div>
                                <div class="col-lg-8 col-md-6 fill_height">
                                    <div class="banner_2_image_container">
                                        <div class="banner_2_image"><img style="max-width:100%; max-height:100%; width:auto; height:auto" src="/images/device-6.png" alt=""></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Brands -->

    <div class="brands">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="brands_slider_container">
                        <!-- Brands Slider -->
                        <div class="owl-carousel owl-theme brands_slider">
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/images/energ.png" alt=""></div></div>
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/images/phenomenon.jpg" alt=""></div></div>
                            <div class="owl-item"><div class="brands_item d-flex flex-column justify-content-center"><img src="/images/shtil.png" alt=""></div></div>
                        </div>
                        <!-- Brands Slider Navigation -->
                        <div class="brands_nav brands_prev"><i class="fa fa-chevron-left"></i></div>
                        <div class="brands_nav brands_next"><i class="fa fa-chevron-right"></i></div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Recently Viewed -->

    <div class="viewed">
        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="viewed_title_container">
                        <h3 class="viewed_title">Недавно просмотренные</h3>
                        <div class="viewed_nav_container">
                            <div class="viewed_nav viewed_prev"><i class="fa fa-chevron-left"></i></div>
                            <div class="viewed_nav viewed_next"><i class="fa fa-chevron-right"></i></div>
                        </div>
                    </div>

                    <div class="viewed_slider_container">

                        <!-- Recently Viewed Slider -->

                        <div class="owl-carousel owl-theme viewed_slider">

                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="/images/view_1.jpg" alt=""></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$225<span>$300</span></div>
                                        <div class="viewed_name"><a href="/#">Beoplay H7</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="/images/view_2.jpg" alt=""></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$379</div>
                                        <div class="viewed_name"><a href="/#">LUNA Smartphone</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="/images/view_3.jpg" alt=""></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$225</div>
                                        <div class="viewed_name"><a href="/#">Samsung J730F...</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div class="viewed_item is_new d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="/images/view_4.jpg" alt=""></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$379</div>
                                        <div class="viewed_name"><a href="/#">Huawei MediaPad...</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div class="viewed_item discount d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="/images/view_5.jpg" alt=""></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$225<span>$300</span></div>
                                        <div class="viewed_name"><a href="/#">Sony PS4 Slim</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>

                            <!-- Recently Viewed Item -->
                            <div class="owl-item">
                                <div class="viewed_item d-flex flex-column align-items-center justify-content-center text-center">
                                    <div class="viewed_image"><img src="/images/view_6.jpg" alt=""></div>
                                    <div class="viewed_content text-center">
                                        <div class="viewed_price">$375</div>
                                        <div class="viewed_name"><a href="/#">Speedlink...</a></div>
                                    </div>
                                    <ul class="item_marks">
                                        <li class="item_mark item_discount">-25%</li>
                                        <li class="item_mark item_new">new</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>
<?php $this->endContent() ?>