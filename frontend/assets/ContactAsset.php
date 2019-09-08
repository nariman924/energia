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
class ContactAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';

    public $css = [
        '/css/contact_styles.css',
        '/css/contact_responsive.css',
    ];

    public $js = [
        '/js/contact_custom.js',
    ];

    public $depends = [
        BaseAsset::class,
    ];
}
