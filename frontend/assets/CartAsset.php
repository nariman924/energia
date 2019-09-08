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
class CartAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        '/css/cart_styles.css',
        '/css/cart_responsive.css',
    ];

    public $js = [
        '/js/cart_custom.js',
    ];

    public $depends = [
        BaseAsset::class,
    ];
}
