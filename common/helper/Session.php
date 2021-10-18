<?php

namespace common\helper;

use Yii;
use yii\base\Object;

class Session extends Object {

    static public function isInCart($id): string {
        $session = Yii::$app->session;
        $session->open();

        if (!isset($session['cart'])) {
            return false;
        }

        $isInCart = in_array($id, array_column($session['cart'], 'id'));

        return $isInCart;
    }

}
