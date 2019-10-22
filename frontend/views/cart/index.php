<?php

use yii\helpers\Url;

\frontend\assets\CartAsset::register($this);
/**
 * @var $this \yii\web\View
 * @var $model \common\models\Page
 */
?>

<!-- Cart -->

<div class="cart_section">
    <div class="container">
        <div class="row">
            <div class="col-lg-10 offset-lg-1">
                <div class="cart_container">
                    <div class="cart_title">Корзина</div>
                    <?php
                    /** @var \common\models\EOffers $product */
                    /** @var \devanych\cart\CartItem $item */
                    foreach ($items as $item) {
                        $product = $item->getProduct(); ?>
                        <div class="cart_items">
                            <ul class="cart_list">
                                <li class="cart_item clearfix">
                                    <div class="cart_item_image"><img src="<?= Yii::$app->fileStorage->baseUrl . '/' . $product->anons_pic ?>" alt=""></div>
                                    <div class="cart_item_info d-flex flex-md-row flex-column justify-content-between">
                                        <div class="cart_item_name cart_info_col">
                                            <div class="cart_item_title"><?= $product->name ?></div>
                                        </div>
                                        <div class="cart_item_quantity cart_info_col ml-5">
                                            <div class="cart_item_title">Количество</div>
                                            <div class="cart_item_text"><?= $item->getQuantity() ?></div>
                                        </div>
                                        <div class="cart_item_price cart_info_col ml-5">
                                            <div class="cart_item_title">Цена за ед.</div>
                                            <div class="cart_item_text"><?= $item->getPrice() ?></div>
                                        </div>
                                        <div class="cart_item_total cart_info_col ml-5">
                                            <div class="cart_item_title">Цена</div>
                                            <div class="cart_item_text"><?= $item->getPrice() * $item->getQuantity() ?></div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    <?php } ?>
                    <!-- Order Total -->
                    <div class="order_total">
                        <div class="order_total_content text-md-right">
                            <div class="order_total_title">Сумма к оплате:</div>
                            <div class="order_total_amount"><?= Yii::$app->cart->getTotalCost(); ?></div>
                        </div>
                    </div>

                    <div class="cart_buttons">
                        <a class="button cart_button_clear" href="<?= Url::toRoute(['cart/clear']) ?>">Очистить</a>
                        <button type="button" class="button cart_button_checkout">Оформить заказ</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
