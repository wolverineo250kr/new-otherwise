<?php

$params = array_merge(
        require __DIR__ . '/../../common/config/params.php', require __DIR__ . '/../../common/config/params-local.php', require __DIR__ . '/params.php', require __DIR__ . '/params-local.php'
);

return [
    'id' => 'app-frontend',
    'name' => 'The New Otherwise',
    'basePath' => dirname(__DIR__),
    'bootstrap' => ['log', 'blog'],
    'controllerNamespace' => 'frontend\controllers',
		    'modules' => [
        'blog' => [
                    'class' => 'wolverineo250kr\blog\modules\frontend\Module',
							'defaultRoute'                       => 'gergererg',
        ],
		],
    'components' => [
        'request' => [
            'csrfParam' => '_csrf-frontend',
        ],
        'user' => [
            'identityClass' => 'common\models\User',
            'enableAutoLogin' => true,
            'identityCookie' => ['name' => '_identity-frontend', 'httpOnly' => true],
        ],
        'session' => [
            // this is the name of the session cookie used for login on the frontend
            'name' => 'advanced-frontend',
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
        'errorHandler' => [
            'errorAction' => 'site/error',
        ],
        'urlManager' => [
            'enablePrettyUrl' => true,
            'showScriptName' => false,
            'rules' => [
                    [
                    'pattern' => 'category/choice-result',
                    'route' => 'category/choice-result',
                ],
                    [
                    'pattern' => 'category/change-sort',
                    'route' => 'category/change-sort',
                ],
                    [
                    'pattern' => 'category/search',
                    'route' => 'category/search',
                ],
                    [
                    'pattern' => 'category/<name:.*?$>',
                    'route' => 'category/index',
                ],
                    [
                    'pattern' => 'product/<name:.*?$>',
                    'route' => 'product/view',
                ],
                    [
                    'pattern' => '<controller>/<action>',
                    'route' => '<controller>/<action>',
                ],
            ],
        ],
    ],
    'params' => $params,
];
