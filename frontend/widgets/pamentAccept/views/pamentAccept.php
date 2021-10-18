<? foreach ($paymentAccept as $payment): ?>
    <?=
    yii\helpers\Html::img($payment->getImage($payment), [
        'alt' => $payment->name,
        'title' => $payment->name
    ])
    ?>
<? endforeach; ?>