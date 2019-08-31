<?php
use yii\helpers\Html;
/* @var $this \yii\web\View */
/* @var $content string */

//\frontend\assets\FrontendAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?php echo Yii::$app->language ?>">
<head>
    <meta charset="<?php echo Yii::$app->charset ?>"/>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <?php echo Html::csrfMetaTags() ?>

<!--    <link href="/plugins/fontawesome-free-5.0.1/css/fontawesome-all.css" rel="stylesheet" type="text/css">-->
<!--    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.carousel.css">-->
<!--    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/owl.theme.default.css">-->
<!--    <link rel="stylesheet" type="text/css" href="/plugins/OwlCarousel2-2.2.1/animate.css">-->
<!--    <link rel="stylesheet" type="text/css" href="/plugins/slick-1.8.0/slick.css">-->
<!--    <link rel="stylesheet" type="text/css" href="/css/main_styles.css">-->
<!--    <link rel="stylesheet" type="text/css" href="/css/responsive.css">-->
    <link rel="stylesheet" type="text/css" href="/bundle/style.css">
</head>
<body>
<?php $this->beginBody() ?>
    <?php echo $content ?>
<?php $this->endBody() ?>
<script src="/plugins/greensock/TweenMax.min.js"></script>
<script src="/plugins/greensock/TimelineMax.min.js"></script>
<script src="/plugins/scrollmagic/ScrollMagic.min.js"></script>
<script src="/plugins/greensock/animation.gsap.min.js"></script>
<script src="/plugins/greensock/ScrollToPlugin.min.js"></script>
<script src="/plugins/OwlCarousel2-2.2.1/owl.carousel.js"></script>
<script src="/plugins/slick-1.8.0/slick.js"></script>
<script src="/plugins/easing/easing.js"></script>
<script src="/js/custom.js"></script>
</body>
</html>
<?php $this->endPage() ?>
