<?php

return [
    'language' => 'ru-RU',
    'name' => 'The New Otherwise',
    'aliases' => [
        '@bower' => '@vendor/bower-asset',
        '@npm' => '@vendor/npm-asset',
    ],
    'vendorPath' => dirname(dirname(__DIR__)) . '/vendor',
    'components' => [
        'cache' => [
            'class' => 'yii\caching\FileCache',
        ],
        'formatter' => [
            'locale' => 'ru-RU',
            'defaultTimeZone' => 'Europe/Moscow',
        ],
    ],
];
