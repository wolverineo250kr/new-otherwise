<?php
$this->title = 'Корзина';
$this->params['header'] = $this->title;
$this->params['header'] = ($this->params['header']) ? $this->params['header'] : $this->title;
$this->params['breadcrumbs'][] = $this->params['header'];
?>

<div class="row">
    <div class="col-sm-8">
        <h1 class="text-uppercase title-category">Корзина</h1>
        <? foreach ($_SESSION['cart'] as $product): ?>
            <div class="col-sm-12 cart-item">
                <div class="row">
                    <div class="col-sm-3">
                        <a href="<?= '/product/' . $product['url'] ?>">
                            <?=
                            yii\helpers\Html::img($product['img'], [
                                'alt' => $product['name'],
                                'title' => $product['name'],
                            ]);
                            ?>
                        </a>
                    </div>
                    <div class="col-sm-4">
                        <?=
                        yii\helpers\Html::a($product['name'], \yii\helpers\Url::to('product/' . $product['url']));
                        ?>
                        <br/>
                        <strong class="text-gray"><?= $product['price'] ?></strong><i class="text-gray fa fa-<?= common\models\Currency::getCurrency()->code ?>" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-2">
                        <input type="number" class="input-text qty text" step="1" min="1" pattern="^[0-9]" max="" name="cart[7cbbc409ec990f19c78c75bd1e06f215][qty]" value="<?= $product['qty'] ?>" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
                    </div>
                    <div class="col-sm-2 price-item">
                        <strong><?= $product['qty'] * $product['price'] ?></strong><i class="fa fa-<?= common\models\Currency::getCurrency()->code ?>" aria-hidden="true"></i>
                    </div>
                    <div class="col-sm-1 text-right">
                        <i class="fa fa-trash-o" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        <? endforeach; ?>
    </div>
    <div class="col-sm-4">
        <div class="row">
            <div class="col-sm-12 itogo-block">
                <div class="row">
                    <div class="col-sm-6">
                        <span>
                            <?=
                            Yii::t(
                                    'app', count($_SESSION['cart']) . ' {n, plural, =0{товаров} =1{товар} one{товар} few{товара} many{товаров} other{товара}}', ['n' => count($_SESSION['cart'])]
                            );
                            ?>
                        </span>
                    </div>
                    <div class="col-sm-6 text-right">
                        <?= $_SESSION['cart.sum'] ?><i class="fa fa-<?= common\models\Currency::getCurrency()->code ?>" aria-hidden="true"></i>
                    </div>
                </div>
            </div>
        </div>
        <div class="row cart-ul">
            <ul>
                <li><?= yii\helpers\Html::img(['/image/bg/ic_verified_user_black_36dp_1x.png']) ?><span>Security policy (edit with module Customer reassurance)</span></li>
                <li><?= yii\helpers\Html::img(['/image/bg/ic_local_shipping_black_36dp_1x.png']) ?><span>Delivery policy (edit with module Customer reassurance)</span></li>
                <li><?= yii\helpers\Html::img(['/image/bg/ic_swap_horiz_black_36dp_1x.png']) ?><span>Return policy (edit with module Customer reassurance)</span></li>
            </ul>
        </div>
    </div>
</div>
<!--
<div class="cart">
<? if ($_SESSION['cart']): ?>
                                                                                                        <table class="shop_table">
                                                                                                            <thead>
                                                                                                                <tr>
                                                                                                                    <th class="product-remove">&nbsp;</th>
                                                                                                                    <th class="product-thumbnail">&nbsp;</th>
                                                                                                                    <th class="product-name">Product</th>
                                                                                                                    <th class="product-price">Price</th>
                                                                                                                    <th class="product-quantity">Quantity</th>
                                                                                                                    <th class="product-subtotal">Total</th>
                                                                                                                </tr>
                                                                                                            </thead>
                                                                                                            <tbody>
    <? foreach ($_SESSION['cart'] as $product): ?>      
                                                                                                                                                                                                                    <tr class="woocommerce-cart-form__cart-item cart-item-<?= $product['id'] ?>">
                                                                                                                                                                                                                        <td class="product-remove">
        <?=
        yii\helpers\Html::a('<i class="fa fa-times" aria-hidden="true"></i>', '#', [
            'class' => 'remove',
            'data-product-id' => $product['id'],
        ]);
        ?>
                                                                                                                                                                                                                        </td>
                                                                                                                                                                                                                        <td class="product-thumbnail">
                                                                                                                                                                                                                            <a href="<?= '/product/' . $product['url'] ?>">
        <?=
        yii\helpers\Html::img($product['img'], [
            'alt' => $product['name'],
            'title' => $product['name'],
        ]);
        ?>
                                                                                                                                                                                                                            </a>


                                                                                                                                                                                                                        </td>
                                                                                                                                                                                                                        <td class="product-name" data-title="Product">                            
        <?=
        yii\helpers\Html::a($product['name'], \yii\helpers\Url::to('product/' . $product['url']));
        ?>
                                                                                                                                                                                                                        </td>
                                                                                                                                                                                                                        <td class="product-price" data-title="Price">
                                                                                                                                                                                                                            <span class="woocommerce-Price-amount amount product-single-price"><?= $product['price'] ?> </span><span class="woocommerce-Price-currencySymbol"><i class="fa fa-<?= common\models\Currency::getCurrency()->code ?>" aria-hidden="true"></i></span>		
                                                                                                                                                                                                                        </td>
                                                                                                                                                                                                                        <td class="product-quantity" data-title="Quantity">
                                                                                                                                                                                                                            <div class="quantity buttons_added">
                                                                                                                                                                                                                                <input type="button" value="-" class="minus" <?= $product['qty'] <= 1 ? 'disabled' : '' ?>>
                                                                                                                                                                                                                                <input type="number" class="input-text qty text" step="1" min="1" pattern="^[0-9]" max="" name="cart[7cbbc409ec990f19c78c75bd1e06f215][qty]" value="<?= $product['qty'] ?>" title="Qty" size="4" pattern="[0-9]*" inputmode="numeric">
                                                                                                                                                                                                                                <input type="button" value="+" class="plus"></div>
                                                                                                                                                                                                                        </td>
                                                                                                                                                                                                                        <td class="product-subtotal second" data-title="Total">
                                                                                                                                                                                                                            <span class="woocommerce-Price-amount amount"><?= $product['qty'] * $product['price'] ?></span> <span class="woocommerce-Price-currencySymbol"><i class="fa fa-<?= common\models\Currency::getCurrency()->code ?>" aria-hidden="true"></i></span>	
                                                                                                                                                                                                                        </td>
                                                                                                                                                                                                                    </tr>

    <? endforeach; ?>
                                                                                                                <tr>


                                                                                                                    <td colspan="6" class="actions">
                                                                                                                        <div class="row">
                                                                                                                            <div class="col-sm-12">
                                                                                                                                <div class="coupon">
                                                                                                                                    <input type="text" name="coupon_code" class="input-text" id="coupon_code" value="" placeholder="Coupon code"> <input type="submit" class="button" name="apply_coupon" value="Apply coupon">
                                                                                                                                </div>
                                                                                                                            </div>

                                                                                                                        </div>
                                                                                                                </tr>
                                                                                                            </tbody>
                                                                                                        </table>
                                                                                                        <div class="row">
                                                                                                            <div class="col-xs-12 col-sm-offset-7 col-sm-5 col-md-offset-6 col-md-6 col-lg-offset-8 col-lg-4 cartcart-collaterals">
                                                                                                                <div class="cart_totals ">


                                                                                                                    <h2>Итого</h2>

                                                                                                                    <table cellspacing="0" class="shop_table shop_table_responsive">

                                                                                                                        <tbody>

                                                                                                                            <tr class="order-total">
                                                                                                                                <th>Всего</th>
                                                                                                                                <td data-title="Total"><strong><span class="woocommerce-Price-amount amount  total-amount"><?= $_SESSION['cart.sum'] ?></span> <span class="woocommerce-Price-currencySymbol"><i class="fa fa-<?= common\models\Currency::getCurrency()->code ?>" aria-hidden="true"></i></span></strong> </td>
                                                                                                                            </tr>


                                                                                                                        </tbody></table>

                                                                                                                    <div class="wc-proceed-to-checkout">

                                                                                                                        <a href="https://eds.edatastyle.com/sorna/?page_id=7" class="col-sm-12 checkout-button button alt wc-forward">
                                                                                                                            Proceed to checkout</a>

    <?=
    yii\helpers\Html::a('Оформить заказ', '#', [
        'class' => 'btn btn-default'
    ]);
    ?>
                                                                                                                    </div>


                                                                                                                </div>
                                                                                                            </div>
                                                                                                        </div>
<? else: ?>
                                                                                                        Корзина пуста
<? endif; ?>

</div>-->
