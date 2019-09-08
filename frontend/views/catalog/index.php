<?php
/* @var $this yii\web\View */

use yii\helpers\Url;

\frontend\assets\CatalogAsset::register($this);

$this->title = Yii::$app->name;

$models = \common\models\EOffers::find()->where(['available' => 1])->all();

$models = array_chunk($models, 3);

?>
<!-- Shop -->

<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Categories</div>
                        <ul class="sidebar_categories">
                            <li><a href="#">Computers & Laptops</a></li>
                            <li><a href="#">Cameras & Photos</a></li>
                            <li><a href="#">Hardware</a></li>
                            <li><a href="#">Smartphones & Tablets</a></li>
                            <li><a href="#">TV & Audio</a></li>
                            <li><a href="#">Gadgets</a></li>
                            <li><a href="#">Car Electronics</a></li>
                            <li><a href="#">Video Games & Consoles</a></li>
                            <li><a href="#">Accessories</a></li>
                        </ul>
                    </div>
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Filter By</div>
                        <div class="sidebar_subtitle">Price</div>
                        <div class="filter_price">
                            <div id="slider-range" class="slider_range"></div>
                            <p>Range: </p>
                            <p><input type="text" id="amount" class="amount" readonly style="border:0; font-weight:bold;"></p>
                        </div>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle color_subtitle">Color</div>
                        <ul class="colors_list">
                            <li class="color"><a href="#" style="background: #b19c83;"></a></li>
                            <li class="color"><a href="#" style="background: #000000;"></a></li>
                            <li class="color"><a href="#" style="background: #999999;"></a></li>
                            <li class="color"><a href="#" style="background: #0e8ce4;"></a></li>
                            <li class="color"><a href="#" style="background: #df3b3b;"></a></li>
                            <li class="color"><a href="#" style="background: #ffffff; border: solid 1px #e1e1e1;"></a></li>
                        </ul>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_subtitle brands_subtitle">Brands</div>
                        <ul class="brands_list">
                            <li class="brand"><a href="#">Apple</a></li>
                            <li class="brand"><a href="#">Beoplay</a></li>
                            <li class="brand"><a href="#">Google</a></li>
                            <li class="brand"><a href="#">Meizu</a></li>
                            <li class="brand"><a href="#">OnePlus</a></li>
                            <li class="brand"><a href="#">Samsung</a></li>
                            <li class="brand"><a href="#">Sony</a></li>
                            <li class="brand"><a href="#">Xiaomi</a></li>
                        </ul>
                    </div>
                </div>

            </div>

            <div class="col-lg-9">

                <!-- Shop Content -->

                <div class="new_arrivals">
                    <div class="container">
                        <?php foreach ($models as $modelsRow) { ?>
                                <div class="row">
                                    <?php foreach ($modelsRow as $singleModel) { ?>
                                        <div class="col-lg-4 mb-5">
                                            <div class="arrivals_single_image">
                                                <img src="<?= Yii::$app->fileStorage->baseUrl . '/' . $singleModel->anons_pic ?>" alt="<?= $singleModel->name ?>">
                                            </div>
                                            <div class="arrivals_single_content">
                                                <div class="arrivals_single_category"><a href="#">
                                                        <?= $singleModel->getECategories()
                                                            ->select('name')
                                                            ->limit(1)
                                                            ->scalar()
                                                        ?></a></div>
                                                <div class="arrivals_single_name_container clearfix">
                                                    <div class="arrivals_single_name">
                                                        <a href="<?= Url::toRoute(['catalog/product', 'id' => $singleModel->id]) ?>">
                                                            <?= $singleModel->name ?>
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
                                                        <div class="arrivals_single_price text-right"><?= $singleModel->price ?> р.</div>
                                                    </div>
                                                </div>
                                                <div class="button d-block mt-2 text-center">
                                                    <a href="<?= Url::toRoute(['catalog/product', 'id' => $singleModel->id]) ?>">Купить</a>
                                                </div>
                                            </div>
                                            <ul class="arrivals_single_marks product_marks">
                                                <li class="arrivals_single_mark product_mark product_new">new</li>
                                            </ul>
                                        </div>
                                    <?php } ?>
                                </div>
                            <?php } ?>

                        <!-- Shop Page Navigation -->

                        <div class="shop_page_nav d-flex flex-row">
                            <div class="page_prev d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-left"></i></div>
                            <ul class="page_nav d-flex flex-row">
                                <li><a href="#">1</a></li>
                                <li><a href="#">2</a></li>
                                <li><a href="#">3</a></li>
                                <li><a href="#">...</a></li>
                                <li><a href="#">21</a></li>
                            </ul>
                            <div class="page_next d-flex flex-column align-items-center justify-content-center"><i class="fas fa-chevron-right"></i></div>
                        </div>

                    </div>
                </div>

            </div>
        </div>
    </div>
</div>