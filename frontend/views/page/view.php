<?php
\frontend\assets\PageAsset::register($this);
/**
 * @var $this \yii\web\View
 * @var $model \common\models\Page
 */
$this->title = $model->title;
?>

<div class="single_post">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="single_post_title"><?php echo $model->title ?></div>
                <div class="single_post_text">
                    <?php echo $model->body ?>
                </div>
            </div>
        </div>
    </div>
</div>