<?php
/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
use common\models\search\EOffersSearch;

\frontend\assets\CatalogAsset::register($this);

$this->title = Yii::$app->name;

$this->registerJs("
    $('.filter-category').click(function(event) {   
        const filter = $(this).data('filter');
        const val = $(this).data('val');
        const url = setUrlParameter(window.location.href, filter, val);
        
        event.preventDefault();
        $.pjax.reload({
            container: '#catalogListView',
            type       : 'GET',
            url        : url,
            data       : {},
            push       : true,
            replace    : false,
            timeout    : 1000,
        });
    });
");

/** @var searchModel EOffersSearch */
?>
<!-- Shop -->

<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section">
                        <div class="sidebar_title">Категории</div>
                        <ul class="sidebar_categories">
                            <?php foreach (\common\models\ECategories::find()->getList() as $item) { ?>
                                <li>
                                    <a data-filter="filter[category]"
                                       data-val="<?= $item['id'] ?>"
                                       class="filter-category"
                                       title="<?= $item['name'] ?>"
                                       href="#"
                                    >
                                        <?= $item['name'] ?>
                                    </a>
                                </li>
                            <?php } ?>
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
                        <?php Pjax::begin([
                            'id' => 'catalogListView'
                        ]) ?>
                        <?= \yii\widgets\ListView::widget([
                            'dataProvider' => $dataProvider,
                            'itemView' => '_item',
                            'layout' => "{sorter}\n{items}\n{summary}\n{pager}",
                            'sorter' => [
                                'attributes' => ['price'],
                            ],
                            'pager' => [
                                'class' => \frontend\widgets\CustomPager::class,
                                'hideOnSinglePage' => true,
                            ],
                        ])?>
                        <?php Pjax::end() ?>
                    </div>
                </div>

            </div>
        </div>
    </div>
</div>
<script>
</script>