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
class HomeAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        '/css/main_styles.css',
        '/css/responsive.css',
    ];

    public $js = [
        '/js/custom.js',
    ];

    public $depends = [
        BaseAsset::class,
    ];
}
