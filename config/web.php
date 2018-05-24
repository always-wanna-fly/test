<?php

$params = require __DIR__ . '/params.php';
$db = require __DIR__ . '/db.php';

$config = [
    'id' => 'basic',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log',
                           'languagepicker'],
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components' => [
        'request' => [
            // !!! insert a secret key in the following (if it is empty) - this is required by cookie validation
            'cookieValidationKey' => '7adcCTrbR_0KXbY5B0dgYCJEF-Vh2WYe',
        ],
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'user' => [
            'identityClass' => 'app\models\User',
            'enableAutoLogin' => true,
        ],
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'mailer' => [
            'class' => 'yii\swiftmailer\Mailer',
            // send all mails to a file by default. You have to set
            // 'useFileTransport' to false and configure a transport
            // for the mailer to send real emails.
            'useFileTransport' => true,
        ],
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0,
            'targets' => [
                [
                    'class' => 'yii\log\FileTarget',
                    'levels' => ['error', 'warning'],
                ],
            ],
        ],
        'db' => $db,
        /*'authManager' => [
            'class' => 'yii\rbac\DbManager',
        ],*/

        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => array(
               '<controller:\w+>/<id:\d+>'=>'<controller>/view',
               '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
               '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),

        ],
        'languagepicker' => [
            'class' => 'lajax\languagepicker\Component',        // List of available languages (icons and text)
            'languages' => ['en' => 'English', 'ru' => 'Russian', 'uk' => 'Ukrainian']
        ]
    ],
    /*'as access' => [
        'class' => 'mdm\admin\components\AccessControl',
        'allowActions' => [
            'site/*',
            'admin/*',
            'some-controller/some-action',
            // The actions listed here will be allowed to everyone including guests.
            // So, 'admin/*' should not appear here in the production, of course.
            // But in the earlier stages of your development, you may probably want to
            // add a lot of actions here until you finally completed setting up rbac,
            // otherwise you may not even take a first step.
        ]
    ],*/
    'modules' => [
        'hello' => [
            'class' => 'app\modules\hello\Hello',
        ],
        'news' => [
            'class' => 'app\modules\news\Module',
        ],
        /*'admin' => [
            'class' => 'mdm\admin\Module',
        ]*/
    ],
    'params' => $params,
    'language' => 'en',


    // set target language to be Russian
    //'language' => 'ru-RU',

    // set source language to be English
    //'sourceLanguage' => 'en-US',
];

if (YII_ENV_DEV) {
    // configuration adjustments for 'dev' environment
    $config['bootstrap'][] = 'debug';
    $config['modules']['debug'] = [
        'class' => 'yii\debug\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];

    $config['bootstrap'][] = 'gii';
    $config['modules']['gii'] = [
        'class' => 'yii\gii\Module',
        // uncomment the following to add your IP if you are not connecting from localhost.
        //'allowedIPs' => ['127.0.0.1', '::1'],
    ];
}

return $config;
