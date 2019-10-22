<?php
/* @var $this yii\web\View */

use yii\bootstrap\ActiveForm;
use yii\helpers\Html;
use yii\widgets\Pjax;

\frontend\assets\CatalogAsset::register($this);

$this->title = 'Каталог товаров';
$topCat = \common\models\ECategories::find()->getList();

/** @var searchModel EOffersSearch */
?>
<!-- Shop -->

<div class="shop">
    <div class="container">
        <div class="row">
            <div class="col-lg-3">

                <!-- Shop Sidebar -->
                <div class="shop_sidebar">
                    <div class="sidebar_section filter_by_section">
                        <div class="sidebar_title">Поиск</div>
                        <?php $form = ActiveForm::begin([
                            'action' => '',
                            'id' => 'search-form',
                            'method' => 'GET',
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                'options' => [
                                    'tag' => false,
                                ],
                            ],
                        ]) ?>
                        <div class="row">
                            <div class="col-sm-9">
                                <?= $form->field($searchModel, 'name')->label(false)
                                    ->textInput(['class' => 'form-control search-input', 'placeholder' => 'поиск']) ?>
                            </div>
                            <div class="col-sm-3">
                                <?= Html::submitButton('<i class="fa fa-search"></i>', ['class' => 'btn btn-primary pull-right']) ?>
                            </div>
                        </div>

                        <?php ActiveForm::end() ?>
<!--                        <div class="sidebar_title">Фильтры</div>-->
                        <div class="sidebar_subtitle">Цена</div>
                        <?php $form = ActiveForm::begin([
                            'action' => '',
                            'id' => 'price-filter-form',
                            'method' => 'GET',
                            'options' => ['class' => 'form-horizontal'],
                            'fieldConfig' => [
                                'options' => [
                                    'tag' => false,
                                ],
                            ],
                        ]) ?>
                        <div class="row">
                            <div class="col-sm-6">
                                <?= $form->field($searchModel, 'priceFrom')->label(false)
                                    ->textInput(['class' => 'form-control', 'placeholder' => 'от'])?>
                            </div>
                            <div class="col-sm-6">
                                <?= $form->field($searchModel, 'priceTo')->label(false)
                                    ->textInput(['class' => 'form-control', 'placeholder' => 'от'])?>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-12">
                                <?= Html::resetButton('Очистить', ['class' => 'btn btn-default pull-left']) ?>
                                <?= Html::submitButton('Применить', ['class' => 'btn btn-primary pull-right']) ?>
                            </div>
                        </div>
                        <?php ActiveForm::end() ?>
                    </div>
                    <div class="sidebar_section">
                        <div class="sidebar_title">Категории</div>
                        <ul class="sidebar_categories">
                            <?php foreach ($topCat as $item) { ?>
                                <li>
                                    <a data-filter="filter[category]"
                                       data-val="<?= $item['shop_id'] ?>"
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
                </div>

            </div>

            <div class="col-lg-9">

                <!-- Shop Content -->

                <div class="new_arrivals">
                    <div class="container">
                        <?php Pjax::begin([
                            'id' => 'catalogListView',
                            'timeout' => 300
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