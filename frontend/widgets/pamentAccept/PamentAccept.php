<?php

namespace frontend\widgets\pamentAccept;

use common\models\PaymentAccept;
use yii\bootstrap\Widget;

class PamentAccept extends Widget {

    public function init() {
        parent::init();
    }

    public function run() {

        $paymentAccept = PaymentAccept::findAll(['is_active' => 1]);

        return $this->render('pamentAccept', [
                    'paymentAccept' => $paymentAccept,
        ]);
    }
}
