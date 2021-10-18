<? if (!empty($session['cart'])): ?>
    <div class="table-responsive">
        <table class="table table-hover table-striped">
            <thead>
                <tr>
                    <th>Фото</th>
                    <th>Наименование</th>
                    <th>Кол-во</th>
                    <th>Цена</th>
                    <th><span class="glyphicon glyphicon-remove" aria-hidden="true"></span></th>
                </tr>
            </thead>
            <tbody>
                <? foreach ($session['cart'] as $id => $item): ?>
                    <tr id="<?=$id?>">
                        <td><?= \yii\helpers\Html::img($item['img'], ['alt' => $item['name'], 'height' => 50]) ?></td>
                        <td>
                            <?=
                            \yii\helpers\Html::a($item['name'], \yii\helpers\Url::to('/product/' . $item['url']))
                            ?>             
                        </td>
                        <td><?= $item['qty'] ?></td>
                        <td><?= $item['price'] ?> <i class="fa fa-<?= \common\models\Currency::getCurrency()->code ?>" aria-hidden="true"></i></td>
                        <td>
                            <?=
                            yii\helpers\Html::a('<i class="fa fa-times" aria-hidden="true"></i>', '#', [
                                'class' => 'remove',
                                'data-product-id' => $id,
                            ]);
                            ?>
                        </td>
                    </tr>
                <? endforeach ?>
                <tr>
                    <td colspan="4">Итого: </td>
                    <td><?= $session['cart.sum'] ?> <i class="fa fa-<?= \common\models\Currency::getCurrency()->code ?>" aria-hidden="true"></i></td>
                </tr>
            </tbody>
        </table>
    </div>
<? else: ?>
    <h3>Корзина пуста</h3>
<? endif; ?>