<?php

use common\helper\Session;
use common\models\Currency;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\ActiveForm;

$this->title = $category->name;
$this->params['header'] = $category->name;
if ($parentCategory) {
    $this->params['breadcrumbs'][] = ["label" => $parentCategory->name, "url" => '/category/' . $parentCategory->url];
}
$this->params['breadcrumbs'][] = $this->params['header'];
?>
<div class="content">
    <div class="row">
        <div class="col-sm-3">
            <section class="sky-form">
                <?
                $form = ActiveForm::begin([
                            'id' => 'search-in-category-form',
                            'options' => ['class' => ''],
                            'enableAjaxValidation' => true,
                            'enableClientValidation' => false,
                            'action' => '#',
                ]);
                ?>
                <div class="hidden">
                    <?=
                            $form->field($model, 'minPrice')
                            ->hiddenInput([
                                'value' => $minPrice
                            ])
                            ->label(false);
                    ?>
                    <?=
                            $form->field($model, 'maxPrice')
                            ->hiddenInput([
                                'value' => $maxPrice
                            ])
                            ->label(false);
                    ?>
                    <?=
                            $form->field($model, 'categoryId')
                            ->hiddenInput([
                                'value' => $category->id
                            ])
                            ->label(false);
                    ?>
                    <?=
                            $form->field($model, 'sortType')
                            ->hiddenInput([
                                'value' => 1
                            ])
                            ->label(false);
                    ?>
                    <?=
                            $form->field($model, 'categoryUrl')
                            ->hiddenInput([
                                'value' => $category->url
                            ])
                            ->label(false);
                    ?>
                </div>
                <?=
                $form->field($model, 'price')->textInput(["id" => "price"]);
                ?>
                <div id="slider-range"></div>
                <?=
                $form->field($model, 'sale')->checkbox([
                    'template' => '<div class="col-md-1">{label}</div><div class="col-md-5">{input}</div><div class="col-md-6">{error}</div>'
                ])
                ?>    
                <?=
                $form->field($model, 'new')->checkbox([
                    'template' => '<div class="col-md-1">{label}</div><div class="col-md-5">{input}</div><div class="col-md-6">{error}</div>'
                ])
                ?>
                <?=
                $form->field($model, 'qty')->checkbox([
                    'template' => '<div class="col-md-1">{label}</div><div class="col-md-5">{input}</div><div class="col-md-6">{error}</div>'
                ])
                ?>      
                <? ActiveForm::end(); ?>
            </section> 
        </div>
        <div class="col-sm-9">
            <h1 class="text-uppercase title-category"><?= $category->name ?></h1>
            <div class="row">
                <div class="col-sm-6 text-left">
                    <div class="change-view-block">
                        <?=
                        Html::a('<i class="fa fa-th active-tab"></i>', "#", [
                            'class' => 'view-tabs'
                        ]);
                        ?> 
                        <?=
                        Html::a('<i class="fa fa-list"></i>', "#", [
                            'class' => 'view-list'
                        ]);
                        ?>
                    </div>
                </div>
                <div class="col-sm-6 text-right">
                    <span class="sort-by">Сортировка:&nbsp;</span>
                    <?=
                    Html::dropDownList('changeSortOptionList', '1', [
                        '1' => 'По популярности',
                        '2' => 'Сначала дешевые',
                        '3' => 'Сначала дорогие',
                            ], [
                        'id' => 'changeSort',
                        'data-category-id' => $category->id
                    ]);
                    ?>
                </div>
            </div>

            <div id="result" class="row">
                <? yii\widgets\Pjax::begin(); ?>
                <? foreach ($products as $product): ?>
                    <div class="col-sm-4 product">
                        <div class="product-block text-center">
                            <? if ($product->sale): ?>
                                <div class="sale text-uppercase ">Sale</div>
                            <? endif; ?>
                            <? if ($product->new): ?>
                                <div class="new text-uppercase ">Новинка</div>
                            <? endif; ?>
                            <?=
                            Html::a(Html::img(\common\models\Product::getMainImage($product->id)), Url::to('/product/' . $product->url), [
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
                            <? if ($product->qty < 1): ?>
                                <p>Нет в наличии</p>
                            <? else: ?>         
                                <? if (!common\helper\Session::isInCart($product->id)): ?>
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
                            <? endif; ?>
                        </div>
                    </div>
                <? endforeach; ?>
                <? yii\widgets\Pjax::end(); ?>
            </div>
            <? if ($pages->pageSize < $pages->totalCount): ?>
                <div class="row">
                    <div class="col-sm-12">
                        <button id="get-more-products" 
                                data-page-id="2" 
                                data-page-size="<?= $pages->pageSize ?>" 
                                data-current-page-size="<?= $pages->pageSize ?>" 
                                data-total-count="<?= $pages->totalCount ?>" 
                                data-category-name="<?= $category->url ?>" 
                                class='col-sm-4 col-sm-offset-4 btn btn-default'>Показать ещё</button>
                    </div> 
                </div> 
            <? endif; ?>
        </div> 
    </div> 
</div> 

<?
$this->registerJs('$("#slider-range").slider({
        range: true,
        min: ' . $minPrice . ',
        max: ' . $maxPrice . ',
        values: [' . $minPrice . ', ' . $maxPrice . '],
        slide: function (event, ui) {
            $("#price").val(ui.values[ 0 ] + " руб - " + ui.values[ 1 ] + " руб");
        },
        change: function(event, ui) {
                $("#searchincategoryform-minprice").val(ui.values[ 0 ]);
                $("#searchincategoryform-maxprice").val(ui.values[ 1 ]);
              
               $.ajax({
                    url: "/category/search",
                    data: $("#search-in-category-form").serialize(),
                    type: "POST",
                    success: function (response) {
                    console.log(response);
                         $("#get-more-products").attr("data-page-id", 3);
                         $("#get-more-products").attr("data-current-page-size", response.pages.pageSizeParam);
                         $("#get-more-products").attr("data-total-count", response.pages.totalCount);
                         if ((parseInt(response.products.length) === 1) || (parseInt($("#get-more-products").attr("data-current-page-size")) === parseInt(response.pages.totalCount))) {
                            $("#get-more-products").slideUp(300);
                         } 
                         $("#result").html(response.html);
                            var tab = $(document).find(".active-tab");
                            if (tab.hasClass("fa-list")) {
                                $(document).find("#result .product").removeClass("col-sm-4").addClass("col-sm-12");
                                $(document).find(".view-tabs").find("i").removeClass("active-tab");
                                $(document).find(".product-block").css("display", "flex");
                                $(document).find(".product-block").css("height", "auto");
                                $(this).find("i").addClass("active-tab");
                            }
                            if (parseInt(response.pages.totalCount) > parseInt(response.products.length)) {
                                $("#get-more-products").slideDown(300);
                            }
                    },
                    error: function () {

                    }
                });
        },
    });

    $("#price").val($("#slider-range").slider("values", 0) +
    " руб - " + $("#slider-range").slider("values", 1) + " руб");');
?>


