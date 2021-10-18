<?php

use common\helper\Domain;
use common\models\Currency;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\View;

/* @var $this View */

$this->title = $product->name ? $product->name : 'Карточка товара';
$this->params['header'] = $product->name;
$this->params['header'] = ($this->params['header']) ? $this->params['header'] : $this->title;
if (!empty($parentCategory)) {
    $this->params['breadcrumbs'][] = ["label" => $parentCategory->name, "url" => '/category/' . $parentCategory->url];
}
$this->params['breadcrumbs'][] = ["label" => $product->category->name, "url" => '/category/' . $product->category->url];
$this->params['breadcrumbs'][] = $this->params['header'];
?>
<div class="row">
    <div class="col-sm-6">
        <? if ($product->images): ?>
            <? $i = 0; ?>
            <? foreach ($product->images as $image): ?> 
                <a data-fancybox="gallery" href="<?= Domain::host() . '://' . Domain::base() . '/image/dynamic/' . $product->category_id . '/' . $product->id . '/' . $image->file_name ?>">
                    <? if ($i == 0): ?>
                        <div class='new text-uppercase <?= !$product->new ? 'hidden' : '' ?>'>Новинка</div>
                        <div class='sale text-uppercase <?= !$product->sale ? 'hidden' : '' ?>' <?= $product->new ? 'style="right: 15px;"' : '' ?>>Sale</div>
                    <? endif; ?>
                    <?=
                    Html::img(Domain::host() . '://' . Domain::base() . '/image/dynamic/' . $product->category_id . '/' . $product->id . '/' . $image->file_name, [
                        'class' => $i != 0 ? 'small' : ''
                    ]);
                    ?>
                </a>
                <? $i++; ?>
            <? endforeach; ?>
        <? else: ?>
            <div class='new text-uppercase <?= !$product->new ? 'hidden' : '' ?>'>Новинка</div>
            <div class='sale text-uppercase <?= !$product->sale ? 'hidden' : '' ?>' <?= $product->new ? 'style="right: 15px;"' : '' ?>>Sale</div>
            <?=
            Html::img(Domain::host() . '://' . Domain::base() . '/image/bg/' . Yii::$app->params['noImage']);
            ?>
        <? endif; ?>
    </div>
    <div class="col-sm-6 info-block">
        <h1 class="text-uppercase"><?= $product->name ?></h1>
        <? if ($product->qty >= 1): ?>
            <div class="price_single">
                <? if ($product->price_sale > 0 && $product->sale): ?>
                    <div class="price price-sale">
                        <?= $product->price_sale ?> <i class="fa fa-<?= Currency::getCurrency()->code ?>" aria-hidden="true"></i>
                    </div>
                <? endif; ?>
                <div class="price <? if ($product->price_sale > 0 && $product->sale): ?>line-through<? endif; ?>">
                    <?= $product->price ?> <i class="fa fa-<?= Currency::getCurrency()->code ?>" aria-hidden="true"></i>
                </div>
            </div>
            <div class="actions-block">
                <div class="hidden-xs hidden-sm col-md-3 text-uppercase">
                    Количество
                </div>
                <div class="col-xs-3 col-sm-3 col-md-2 qty-block">
                    <input value="1" min="1" type="number" class="qty" autocomplete="off"/>
                    <div class="change-buttons">
                        <div class="plus text-center">
                            <i class="fa fa-angle-up" aria-hidden="true"></i>
                        </div>                
                        <div class="minus text-center">
                            <i class="fa fa-angle-down" aria-hidden="true"></i>
                        </div>
                    </div>
                </div>
                <div class="col-xs-9 col-sm-5 col-md-4 text-uppercase">
                    <? if (!$isInCart): ?>
                        <? if ($product->qty >= 1): ?>
                            <?=
                            Html::a('<i class="fa fa-shopping-cart"></i> В корзину', '#', [
                                'id' => 'add-to-cart',
                                'data-product-id' => $product->id,
                                'class' => 'btn btn-info col-sm-12',
                            ])
                            ?> 

                        <? endif; ?>
                    <? else: ?>
                        Товар в <?= Html::a('корзине', Url::to('/cart')) ?>.
                    <? endif; ?>
                </div>
                <div class="col-sm-4 col-md-3 hidden-xs">
                    <i class="fa fa-check" aria-hidden="true"></i> В наличии
                </div>
            </div>
        <? else: ?>
            <p>Нет в наличии</p>
        <? endif; ?>
    </div> 
</div>
<div class="col-sm-12">
    <div class="row">
        <ul class="nav nav-tabs text-uppercase">
            <li class="active"><a data-toggle="tab" href="#description">описание товара</a></li>
            <li><a data-toggle="tab" href="#characteristics">Характеристики</a></li>
            <li><a data-toggle="tab" href="#reviews">Отзывы</a></li>
        </ul>

        <div class="tab-content">

            <div id="description" class="tab-pane fade in active">
                <p>
                    <?= $product->description ? $product->description : 'Описание к данному товару отсутствует' ?>
                </p>
            </div>
            <div id="characteristics" class="tab-pane fade">
                <? foreach ($product->productToCharacteristics as $characteristic): ?>
                    <?= $characteristic->characteristicName->name ?>:  <?= $characteristic->value ?><p/>
                <? endforeach; ?>
            </div>        
            <div id="reviews" class="tab-pane fade">
                <p>     
                    Lorem ipsum dolor sit amet, consectetuer adipiscing elit, sed diam nonummy nibh euismod tincidunt ut laoreet dolore magna aliquam erat volutpat. Ut wisi enim ad minim veniam, quis nostrud exerci tation ullamcorper suscipit lobortis nisl ut aliquip ex ea commodo consequat. Duis autem vel eum iriure dolor in hendrerit in vulputate velit esse molestie consequat, vel illum dolore eu feugiat nulla facilisis at vero eros et accumsan et iusto odio dignissim qui blandit praesent luptatum zzril delenit augue duis dolore te feugait nulla facilisi. Nam liber tempor cum soluta nobis eleifend option congue nihil imperdiet doming id quod mazim placerat facer possim assum.
                </p>
            </div
        </div>
    </div>
</div>
</div>
