<?php
/**
 * Configuration file for the "yii asset" console command.
 */

// In the console environment, some path aliases may not exist. Please define these:
use frontend\assets\ContactAsset;
use frontend\assets\FrontendAsset;
use frontend\assets\BaseAsset;
use frontend\assets\HomeAsset;
use frontend\assets\PageAsset;
use frontend\assets\ProductAsset;

Yii::setAlias('@webroot', __DIR__ . '/../web');
 Yii::setAlias('@web', '/');
 Yii::setAlias('@utilities', __DIR__ . '/../../utilities');

 $css = Yii::getAlias('@utilities/compiler.jar');
 $js = Yii::getAlias('@utilities/yuicompressor.jar');

return [
    // Adjust command/callback for JavaScript files compressing:
    'jsCompressor' => "java -jar {$css} --js {from} --js_output_file {to}",
    // Adjust command/callback for CSS files compressing:
    'cssCompressor' => "java -jar {$js} --type css {from} -o {to}",
    // Whether to delete asset source after compression:
    'deleteSource' => false,
    // The list of asset bundles to compress:
    // Asset bundle for compression output:
    'bundles' => [
        BaseAsset::class,
        HomeAsset::class,
        ProductAsset::class,
        ContactAsset::class,
        PageAsset::class,
    ],
    'targets' => [
        'base' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@webroot/static',
            'baseUrl' => '@web/static',
            'js' => 'base-{hash}.js',
            'css' => 'base-{hash}.css',
            'depends' => [
                BaseAsset::class,
            ],
        ],
        'home' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@webroot/static',
            'baseUrl' => '@web/static',
            'js' => 'home-{hash}.js',
            'css' => 'home-{hash}.css',
            'depends' => [
                HomeAsset::class
            ],
        ],
        'product' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@webroot/static',
            'baseUrl' => '@web/static',
            'js' => 'product-{hash}.js',
            'css' => 'product-{hash}.css',
            'depends' => [
                ProductAsset::class
            ],
        ],
        'contact' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@webroot/static',
            'baseUrl' => '@web/static',
            'js' => 'contact-{hash}.js',
            'css' => 'contact-{hash}.css',
            'depends' => [
                ContactAsset::class
            ],
        ],
        'page' => [
            'class' => 'yii\web\AssetBundle',
            'basePath' => '@webroot/static',
            'baseUrl' => '@web/static',
            'js' => 'page-{hash}.js',
            'css' => 'page-{hash}.css',
            'depends' => [
                PageAsset::class
            ],
        ],
    ],
    // Asset manager configuration:
    'assetManager' => [
        'basePath' => '@webroot/assets',
        'baseUrl' => '@web/assets',
    ],
];