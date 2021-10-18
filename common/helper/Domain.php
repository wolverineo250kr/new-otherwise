<?php

namespace common\helper;

use Yii;
use yii\base\Object;
use yii\helpers\Html;

class Domain extends Object
{

    static public function base(): string
    {
        $hostName = explode('.', Yii::$app->request->hostName);
        $zone     = array_pop($hostName);
        $name     = array_pop($hostName);
        return implode('.', [$name, $zone]);
    }

    static public function host(): string
    {
        return explode(':', Yii::$app->request->hostInfo)[0];
    }

    static public function cabinet(): string
    {
        return Yii::$app->params['subdomain']['cabinet'].self::base();
    }
}