<?php

use yii\helpers\Url;

\frontend\assets\HomeAsset::register($this);
/* @var $this yii\web\View */
$this->title = Yii::$app->name;

$latest = \common\models\EOffers::find()
    ->where(['available' => 1])
    ->orderBy(['shop_id' => SORT_DESC])
    ->limit(8)
    ->all();

$latest = array_chunk($latest, 4);

?>
<!-- Banner -->

<div class="banner">
    <div class="banner_background" style="background-image:url(images/banner_background.jpg)"></div>
    <div class="container fill_height">
        <div class="row fill_height">
            <div class="banner_product_image"><img src="/images/device-3.png" alt=""></div>
            <div class="col-lg-8 offset-lg-4 fill_height">
                <div class="banner_content">
                    <h1 class="banner_text">Интернет магазин электрооборудования</h1>
                    <div style="margin-top: 100px" class="banner_product_name">Широкий ассортимент от ведущих <br> российских производителей
                        <br> энегрооборудования</div>
                    <div class="button banner_button"><a href="/#">Каталог</a></div>
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
                        <div class="char_title">Доставка по России</div>
                        <div class="char_subtitle">от 3000 бесплатно</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="/images/char_2.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Гарантия и возврат</div>
                        <div class="char_subtitle">+1 год на товары Энергия</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="/images/char_3.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Оплата при получении</div>
                        <div class="char_subtitle">или online</div>
                    </div>
                </div>
            </div>

            <!-- Char. Item -->
            <div class="col-lg-3 col-md-6 char_col">

                <div class="char_item d-flex flex-row align-items-center justify-content-start">
                    <div class="char_icon"><img src="/images/char_4.png" alt=""></div>
                    <div class="char_content">
                        <div class="char_title">Низкие цены</div>
                        <div class="char_subtitle">от производителя</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Hot New Arrivals -->

<div class="new_arrivals">
    <div class="container">
        <h3 class="reviews_title">Новинки</h3>
        <!-- Product Panel -->
            <?php foreach ($latest as $latestArr) { ?>
                <div class="row">
                <?php foreach ($latestArr as $latestItem) { ?>
                    <div class="col-lg-3 mb-5">
                        <div class="arrivals_single_image">
                            <img src="<?= Yii::$app->fileStorage->baseUrl . '/' . $latestItem->anons_pic ?>" alt="<?= $latestItem->name ?>">
                        </div>
                        <div class="arrivals_single_content">
                            <div class="arrivals_single_category"><a href="#">
                                    <?= $latestItem->getECategories()
                                        ->select('name')
                                        ->limit(1)
                                        ->scalar()
                                    ?></a></div>
                            <div class="arrivals_single_name_container clearfix">
                                <div class="arrivals_single_name">
                                    <a href="<?= Url::toRoute(['catalog/product', 'id' => $latestItem->id]) ?>">
                                        <?= $latestItem->name ?>
                                    </a>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="rating_r rating_r_5 arrivals_single_rating">
                                        <i></i><i></i><i></i><i></i><i></i>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="arrivals_single_price text-right"><?= $latestItem->price ?> р.</div>
                                </div>
                            </div>
                            <div class="button d-block mt-2 text-center">
                                <a href="<?= Url::toRoute(['catalog/product', 'id' => $latestItem->id]) ?>">Подробнее..</a>
                            </div>
                        </div>
                        <ul class="arrivals_single_marks product_marks">
                            <li class="arrivals_single_mark product_mark product_new">new</li>
                        </ul>
                    </div>
                <?php } ?>
                </div>
            <?php } ?>
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