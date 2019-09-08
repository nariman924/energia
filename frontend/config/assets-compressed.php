<?php
/**
 * This file is generated by the "yii asset" command.
 * DO NOT MODIFY THIS FILE DIRECTLY.
 * @version 2019-09-08 19:24:27
 */
return [
    'base' => [
        'class' => 'yii\\web\\AssetBundle',
        'basePath' => '@webroot/static',
        'baseUrl' => '@web/static',
        'js' => [
            'base-01ec49c1e4ead2c4d249458598e36f6e.js',
        ],
        'css' => [
            'base-3d3897f276e51e9df441943255754e93.css',
        ],
        'depends' => [],
        'sourcePath' => null,
    ],
    'home' => [
        'class' => 'yii\\web\\AssetBundle',
        'basePath' => '@webroot/static',
        'baseUrl' => '@web/static',
        'js' => [
            'home-114548b8dea4472d51d25f41a8b80dd3.js',
        ],
        'css' => [
            'home-3973cf648b9e413416fef7682b389a85.css',
        ],
        'depends' => [],
        'sourcePath' => null,
    ],
    'product' => [
        'class' => 'yii\\web\\AssetBundle',
        'basePath' => '@webroot/static',
        'baseUrl' => '@web/static',
        'js' => [
            'product-ba902a98fb0384d970162538a526994d.js',
        ],
        'css' => [
            'product-a9178e919d595f246f593baac1a55eb9.css',
        ],
        'depends' => [],
        'sourcePath' => null,
    ],
    'contact' => [
        'class' => 'yii\\web\\AssetBundle',
        'basePath' => '@webroot/static',
        'baseUrl' => '@web/static',
        'js' => [
            'contact-4dc426ebdea9160b5a8e7d443f069c29.js',
        ],
        'css' => [
            'contact-cb488d53c7832daf4db78dde82ecef88.css',
        ],
        'depends' => [],
        'sourcePath' => null,
    ],
    'page' => [
        'class' => 'yii\\web\\AssetBundle',
        'basePath' => '@webroot/static',
        'baseUrl' => '@web/static',
        'js' => [
            'page-4dc426ebdea9160b5a8e7d443f069c29.js',
        ],
        'css' => [
            'page-86fb8025f9eaaeb52311ab073215a72a.css',
        ],
        'depends' => [],
        'sourcePath' => null,
    ],
    'catalog' => [
        'class' => 'yii\\web\\AssetBundle',
        'basePath' => '@webroot/static',
        'baseUrl' => '@web/static',
        'js' => [
            'catalog-65de18308118f33bc789993394d27684.js',
        ],
        'css' => [
            'catalog-e5bfa32397c9cf129b53f358b6038d77.css',
        ],
        'depends' => [],
        'sourcePath' => null,
    ],
    'cart' => [
        'class' => 'yii\\web\\AssetBundle',
        'basePath' => '@webroot/static',
        'baseUrl' => '@web/static',
        'js' => [
            'cart-4dc426ebdea9160b5a8e7d443f069c29.js',
        ],
        'css' => [
            'cart-fd7d77873e54cce51fdb399e8a4270e9.css',
        ],
        'depends' => [],
        'sourcePath' => null,
    ],
    'frontend\\assets\\BaseAsset' => [
        'sourcePath' => null,
        'js' => [],
        'css' => [],
        'depends' => [
            'base',
        ],
    ],
    'frontend\\assets\\HomeAsset' => [
        'sourcePath' => null,
        'js' => [],
        'css' => [],
        'depends' => [
            'frontend\\assets\\BaseAsset',
            'home',
        ],
    ],
    'frontend\\assets\\ProductAsset' => [
        'sourcePath' => null,
        'js' => [],
        'css' => [],
        'depends' => [
            'frontend\\assets\\BaseAsset',
            'product',
        ],
    ],
    'frontend\\assets\\ContactAsset' => [
        'sourcePath' => null,
        'js' => [],
        'css' => [],
        'depends' => [
            'frontend\\assets\\BaseAsset',
            'contact',
        ],
    ],
    'frontend\\assets\\PageAsset' => [
        'sourcePath' => null,
        'js' => [],
        'css' => [],
        'depends' => [
            'frontend\\assets\\BaseAsset',
            'page',
        ],
    ],
    'frontend\\assets\\CatalogAsset' => [
        'sourcePath' => null,
        'js' => [],
        'css' => [],
        'depends' => [
            'frontend\\assets\\BaseAsset',
            'catalog',
        ],
    ],
    'frontend\\assets\\CartAsset' => [
        'sourcePath' => null,
        'js' => [],
        'css' => [],
        'depends' => [
            'frontend\\assets\\BaseAsset',
            'cart',
        ],
    ],
];