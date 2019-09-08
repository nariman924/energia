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
class PageAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        '/css/regular_styles.css',
        '/css/regular_responsive.css',
    ];

    public $js = [
        '/js/regular_custom.js',
    ];

    public $depends = [
        BaseAsset::class,
    ];
}
