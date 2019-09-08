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
class ProductAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        '/css/product_styles.css',
        '/css/product_responsive.css',
    ];

    public $js = [
        '/js/product_custom.js',
    ];

    public $depends = [
        BaseAsset::class,
    ];
}
