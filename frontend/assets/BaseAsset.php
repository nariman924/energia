<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace frontend\assets;

use yii\web\AssetBundle;

/**
 * Frontend application asset
 */
class BaseAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        '/plugins/bootstrap4/bootstrap.min.css',
        '/plugins/OwlCarousel2-2.2.1/owl.carousel.css',
        '/plugins/OwlCarousel2-2.2.1/owl.theme.default.css',
        '/plugins/OwlCarousel2-2.2.1/animate.css',
        '/plugins/slick-1.8.0/slick.css',
    ];

    public $js = [
        '/plugins/jquery/jquery-3.3.1.min.js',
        '/plugins/bootstrap4/popper.js',
        '/plugins/bootstrap4/bootstrap.min.js',
        '/plugins/greensock/TweenMax.min.js',
        '/plugins/greensock/TimelineMax.min.js',
        '/plugins/scrollmagic/ScrollMagic.min.js',
        '/plugins/greensock/animation.gsap.min.js',
        '/plugins/greensock/ScrollToPlugin.min.js',
        '/plugins/OwlCarousel2-2.2.1/owl.carousel.js',
        '/plugins/slick-1.8.0/slick.js',
        '/plugins/easing/easing.js',
        '/js/functions.js',
    ];
}
