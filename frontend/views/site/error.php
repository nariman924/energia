<?php
\frontend\assets\PageAsset::register($this);

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>
<div class="single_post">
    <div class="container">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <div class="site-error">

                    <h1><?php echo Html::encode($this->title) ?></h1>

                    <div class="alert alert-danger">
                        <?php echo nl2br(Html::encode($message)) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
