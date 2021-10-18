<?php

use common\helper\Session;
use common\models\Currency;
use common\models\Product;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\Pjax;
?>
<? Pjax::begin(); ?>
<? foreach ($products as $product): ?>
    <? if ($product->qty > 1): ?>
        <div class="col-sm-4 product">
            <div class="product-block text-center">
                <? if ($product->sale): ?>
                    <div class="sale text-uppercase ">Sale</div>
                <? endif; ?>
                <? if ($product->new): ?>
                    <div class="new text-uppercase ">Новинка</div>
                <? endif; ?>
                <?=
                Html::a(Html::img(Product::getMainImage($product->id)), Url::to('/product/' . $product->url), [
                    'class' => 'image-link'
                ]);
                ?> 
                <?=
                Html::a($product->name, Url::to('/product/' . $product->url), [
                    'data-id' => $product->id,
                    'class' => 'name'
                ]);
                ?> 
                <? if ($product->qty > 1): ?>
                    <div class="row">
                        <div class="col-sm-12">
                            <? if ($product->price_sale > 0): ?>
                                <div class="price price-small-block-sale col-sm-6"><?= $product->price_sale ?> <i class="fa fa-<?= Currency::getCurrency()->code ?>" aria-hidden="true"></i></div>
                            <? endif; ?>
                            <div class="price-small-block <? if ($product->price_sale > 0): ?>line-through col-sm-6<? endif; ?>"><?= $product->price ?> <i class="fa fa-<?= Currency::getCurrency()->code ?>" aria-hidden="true"></i></div>
                        </div>
                    </div>
                <? endif; ?>     
                <? if (!Session::isInCart($product->id)): ?>
                    <div class="button-block">
                        <?=
                        Html::a('<i class="fa fa-heart-o" aria-hidden="true"></i>', '#', [
                            'data-id' => $product->id,
                            'id' => '',
                            'class' => 'btn btn-default text-uppercase'
                        ]);
                        ?> 
                        <?=
                        Html::a('<i class="fa fa-shopping-cart" aria-hidden="true"></i> В корзину</a>', '#', [
                            'data-id' => $product->id,
                            'id' => 'add-to-cart',
                            'class' => 'btn btn-default text-uppercase'
                        ]);
                        ?> 
                    </div>
                <? else: ?>
                    <div class="in-cart">
                        Товар в <?=
                        Html::a('корзине', Url::to('/cart'))
                        ?>.
                    </div>
                <? endif; ?>
            </div>
        </div>
    <? endif; ?>
<? endforeach; ?>
<? foreach ($products as $product): ?>
    <? if ($product->qty < 1): ?>
        <div class="col-sm-4 product">
            <div class="product-block text-center">
                <? if ($product->sale): ?>
                    <div class="sale text-uppercase ">Sale</div>
                <? endif; ?>
                <? if ($product->new): ?>
                    <div class="new text-uppercase ">Новинка</div>
                <? endif; ?>
                <?=
                Html::a(Html::img(Product::getMainImage($product->id)), Url::to('/product/' . $product->url), [
                    'class' => 'image-link'
                ]);
                ?> 
                <?=
                Html::a($product->name, Url::to('/product/' . $product->url), [
                    'data-id' => $product->id,
                    'class' => 'name'
                ]);
                ?> 
                <p>Нет в наличии</p>
            </div>
        </div>
    <? endif; ?>
<? endforeach; ?>
<? Pjax::end(); ?>
