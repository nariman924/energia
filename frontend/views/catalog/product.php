<?php
\frontend\assets\ProductAsset::register($this);
/* @var $this yii\web\View */

use yii\helpers\Url;

$this->title = Yii::$app->name;
/** @var $model \common\models\EOffers */
?>
<!-- Single Product -->

<div class="single_product">
    <div class="container">
        <div class="row">

            <!-- Images -->
            <div class="col-lg-2 order-lg-1 order-2">
                <ul class="image_list">
                    <?php foreach ($model->getEOfferPictures()->limit(3)->all() as $picture)  { ?>
                        <li data-image="<?= $picture->url ?>"><img src="<?= $picture->url ?>" alt="<?= $model->name ?>"></li>
                    <?php } ?>
                </ul>
            </div>

            <!-- Selected Image -->
            <div class="col-lg-5 order-lg-2 order-1">
                <div class="image_selected">
                    <?php if ($picture) { ?>
                    <li data-image="<?= $picture->url ?>"><img src="<?= $picture->url ?>" alt="<?= $model->name ?>"></li>
                    <?php } ?>
                </div>
            </div>

            <!-- Description -->
            <div class="col-lg-5 order-3">
                <div class="product_description">
                    <div class="product_category">
                        <?= $model->getECategories()
                            ->select('name')
                            ->limit(1)
                            ->scalar()
                        ?>
                    </div>
                    <div class="product_name"><?= $model->name ?></div>
                    <div class="rating_r rating_r_4 product_rating"><i></i><i></i><i></i><i></i><i></i></div>
                    <div class="product_text"><p><?= $model->description ?></p></div>
                    <div class="order_info d-flex flex-row">
                        <form action="#">
                            <div class="clearfix" style="z-index: 1000;">

                                <!-- Product Quantity -->
                                <div class="product_quantity clearfix">
                                    <span>Quantity: </span>
                                    <input id="quantity_input" type="text" pattern="[0-9]*" value="1">
                                    <div class="quantity_buttons">
                                        <div id="quantity_inc_button" class="quantity_inc quantity_control"><i class="fa fa-chevron-up"></i></div>
                                        <div id="quantity_dec_button" class="quantity_dec quantity_control"><i class="fa fa-chevron-down"></i></div>
                                    </div>
                                </div>

                                <!-- Product Color -->
                                <ul class="product_color">
                                    <li>
                                        <span>Color: </span>
                                        <div class="color_mark_container"><div id="selected_color" class="color_mark"></div></div>
                                        <div class="color_dropdown_button"><i class="fa fa-chevron-down"></i></div>

                                        <ul class="color_list">
                                            <li><div class="color_mark" style="background: #999999;"></div></li>
                                            <li><div class="color_mark" style="background: #b19c83;"></div></li>
                                            <li><div class="color_mark" style="background: #000000;"></div></li>
                                        </ul>
                                    </li>
                                </ul>

                            </div>

                            <div class="product_price"><?= $model->price ?> р.</div>
                            <div class="button_container">
                                <button type="button" class="button cart_button">В корзину</button>
                                <div class="product_fav"><i class="fa fa-heart"></i></div>
                            </div>

                        </form>
                    </div>
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
                                <div class="viewed_image"><img src="images/view_1.jpg" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225<span>$300</span></div>
                                    <div class="viewed_name"><a href="#">Beoplay H7</a></div>
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
                                <div class="viewed_image"><img src="images/view_2.jpg" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$379</div>
                                    <div class="viewed_name"><a href="#">LUNA Smartphone</a></div>
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
                                <div class="viewed_image"><img src="images/view_3.jpg" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225</div>
                                    <div class="viewed_name"><a href="#">Samsung J730F...</a></div>
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
                                <div class="viewed_image"><img src="images/view_4.jpg" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$379</div>
                                    <div class="viewed_name"><a href="#">Huawei MediaPad...</a></div>
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
                                <div class="viewed_image"><img src="images/view_5.jpg" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$225<span>$300</span></div>
                                    <div class="viewed_name"><a href="#">Sony PS4 Slim</a></div>
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
                                <div class="viewed_image"><img src="images/view_6.jpg" alt=""></div>
                                <div class="viewed_content text-center">
                                    <div class="viewed_price">$375</div>
                                    <div class="viewed_name"><a href="#">Speedlink...</a></div>
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
