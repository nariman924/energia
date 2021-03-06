<?php
$config = [
    'homeUrl' => Yii::getAlias('@frontendUrl'),
    'controllerNamespace' => 'frontend\controllers',
    'defaultRoute' => 'site/index',
    'bootstrap' => ['maintenance'],
    'modules' => [
        'user' => [
            'class' => frontend\modules\user\Module::class,
            'shouldBeActivated' => false,
            'enableLoginByPass' => false,
        ],
    ],
    'components' => [
        'assetManager' => [
            'bundles' => array_merge([
                [
                    'yii\bootstrap\BootstrapAsset' => [
                        'css' => [
                            Yii::getAlias('@frontendUrl') . '/plugins/bootstrap4/bootstrap.min.css'
                        ],
                        'js' => [
                            Yii::getAlias('@frontendUrl') . '/plugins/bootstrap4/popper.js',
                            Yii::getAlias('@frontendUrl') . '/plugins/bootstrap4/bootstrap.min.js',
                        ],
                    ],
                    'yii\bootstrap\BootstrapPluginAsset' => [
                        'js'=>[]
                    ],
                    'yii\web\JqueryAsset' => [
                        'js'=>[
                            Yii::getAlias('@frontendUrl') . '/plugins/jquery/jquery-3.3.1.min.js'
                        ]
                    ],
                ],
            ], YII_ENV_DEV ? [] : require(__DIR__ . '/assets-compressed.php')),
        ],
        'authClientCollection' => [
            'class' => yii\authclient\Collection::class,
            'clients' => [
                'github' => [
                    'class' => yii\authclient\clients\GitHub::class,
                    'clientId' => env('GITHUB_CLIENT_ID'),
                    'clientSecret' => env('GITHUB_CLIENT_SECRET')
                ],
                'facebook' => [
                    'class' => yii\authclient\clients\Facebook::class,
                    'clientId' => env('FACEBOOK_CLIENT_ID'),
                    'clientSecret' => env('FACEBOOK_CLIENT_SECRET'),
                    'scope' => 'email,public_profile',
                    'attributeNames' => [
                        'name',
                        'email',
                        'first_name',
                        'last_name',
                    ]
                ]
            ]
        ],
        'errorHandler' => [
            'errorAction' => 'site/error'
        ],
        'maintenance' => [
            'class' => common\components\maintenance\Maintenance::class,
            'enabled' => function ($app) {
                if (env('APP_MAINTENANCE') === '1') {
                    return true;
                }
                return $app->keyStorage->get('frontend.maintenance') === 'enabled';
            }
        ],
        'request' => [
            'cookieValidationKey' => env('FRONTEND_COOKIE_VALIDATION_KEY'),
            'baseUrl' => ''
        ],
        'user' => [
            'class' => yii\web\User::class,
            'identityClass' => common\models\User::class,
            'loginUrl' => ['/user/sign-in/login'],
            'enableAutoLogin' => true,
            'as afterLogin' => common\behaviors\LoginTimestampBehavior::class
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
            'cachePath' => '@frontend/runtime/cache'
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => false,
            'transport' => [
                'class' => 'Swift_SmtpTransport',
                'host' => env('SMTP_HOST'),
                'port' => env('SMTP_PORT'),
                'username' => env('SMTP_USER'),
                'password' => env('SMTP_PASS'),
            ],
        ],
        'cart' => [
            'class' => \devanych\cart\Cart::class,
            'storageClass' => 'devanych\cart\storage\SessionStorage',
            'calculatorClass' => 'devanych\cart\calculators\SimpleCalculator',
            'params' => [
                'key' => 'cart',
                'expire' => 604800,
                'productClass' => \common\models\EOffers::class,
                'productFieldId' => 'id',
                'productFieldPrice' => 'price',
            ],
        ],
    ]
];

if (YII_ENV_DEV) {
    $config['modules']['gii'] = [
        'class' => yii\gii\Module::class,
        'generators' => [
            'crud' => [
                'class' => yii\gii\generators\crud\Generator::class,
                'messageCategory' => 'frontend'
            ]
        ]
    ];
}

return $config;
