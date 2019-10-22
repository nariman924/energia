<?php

use yii\helpers\Url;

?>
<div class="row arrivals_container">
    <div class="col-md-3">
        <div class="arrivals_single_image">
            <img src="<?= Yii::$app->fileStorage->baseUrl . '/' . $model->anons_pic ?>" alt="<?= $model->name ?>">
        </div>
    </div>
    <div class="col-md-9">
        <div class="arrivals_single_content">
            <div class="row">
                <div class="col-md-9">
                    <div class="arrivals_single_name_container clearfix">
                        <div class="arrivals_single_name">
                            <a href="<?= Url::toRoute(['catalog/product', 'id' => $model->id]) ?>">
                                <?= $model->name ?>
                            </a>
                        </div>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="arrivals_single_price"><?= $model->price ?> р.</div>
                </div>
            </div>
            <div class="d-flex justify-content-between">
                <div class="rating_r rating_r_5 arrivals_single_rating">
                    <i></i><i></i><i></i><i></i><i></i>
                </div>
                <div>
                    <a class="btn btn-primary" href="<?= Url::toRoute(['catalog/product', 'id' => $model->id]) ?>">Подробнее</a>
                </div>
            </div>
        </div>
    </div>
</div>
