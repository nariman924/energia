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
class CatalogAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        '/css/shop_styles.css',
        '/css/shop_responsive.css',
        '/plugins/jquery-ui-1.12.1.custom/jquery-ui.css',
    ];

    public $js = [
        '/plugins/jquery-ui-1.12.1.custom/jquery-ui.js',
        '/plugins/Isotope/isotope.pkgd.min.js',
        '/js/shop_custom.js',
    ];

    public $depends = [
        BaseAsset::class,
    ];
}
