<?php
use common\helper\Session;
use common\models\Currency;
use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Все товары';
?>
<div class="login">
    <div class="wrap">
        <div class="rsidebar span_1_of_left">
            <section class="sky-form">
                <h4>Occasion</h4>
                <div class="row row1 scroll-pane">
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Athletic (20)</label>
                    </div>
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Athletic Shoes (48)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Casual (45)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Casual (45)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other (1)</label>
                    </div>
                </div>
                <h4>Category</h4>
                <div class="row row1 scroll-pane">
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Flats (70)</label>
                    </div>
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Athletic Shoes (48)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Athletic Shoes (48)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Heels (38)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other (1)</label>
                    </div>
                </div>
                <h4>Styles</h4>
                <div class="row row1 scroll-pane">
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Athletic (20)</label>
                    </div>
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Ballerina (5)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Pumps (7)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>High Tops (2)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Other (1)</label>
                    </div>
                </div>
            </section>
            <section class="sky-form">
                <h4>Brand</h4>
                <div class="row row1 scroll-pane">
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Adidas by Stella McCartney</label>
                    </div>
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Asics</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Bloch</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Bloch Kids</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Capezio</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Capezio Kids</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Nike</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Zumba</label>
                    </div>
                </div>
            </section>
            <section class="sky-form">
                <h4>Heel Height</h4>
                <div class="row row1 scroll-pane">
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Flat (20)</label>
                    </div>
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Under 1in(5)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>1in - 1 3/4 in(5)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>2in - 2 3/4 in(3)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>3in - 3 3/4 in(2)</label>
                    </div>
                </div>
            </section>
            <section class="sky-form">
                <h4>Price</h4>
                <div class="row row1 scroll-pane">
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>$50.00 and Under (30)</label>
                    </div>
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$100.00 and Under (30)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$200.00 and Under (30)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$300.00 and Under (30)</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>$400.00 and Under (30)</label>
                    </div>
                </div>
            </section>
            <section class="sky-form">
                <h4>Colors</h4>
                <div class="row row1 scroll-pane">
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox" checked=""><i></i>Red</label>
                    </div>
                    <div class="col col-4">
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Green</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Black</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Yellow</label>
                        <label class="checkbox"><input type="checkbox" name="checkbox"><i></i>Orange</label>
                    </div>
                </div>
            </section>
        </div>
        <div class="cont span_2_of_3">
            <div class="mens-toolbar">
                <div class="sort">
                    <div class="sort-by">
                        <label>Sort By</label>
                        <select>
                            <option value="">
                                Popularity               </option>
                            <option value="">
                                Price : High to Low               </option>
                            <option value="">
                                Price : Low to High               </option>
                        </select>
                        <a href=""><img src="images/arrow2.gif" alt="" class="v-middle"></a>
                    </div>
                </div>
                <div class="pager">   
                    <div class="limiter visible-desktop">
                        <label>Show</label>
                        <select>
                            <option value="" selected="selected">
                                9                </option>
                            <option value="">
                                15                </option>
                            <option value="">
                                30                </option>
                        </select> per page        
                    </div>
                    <ul class="dc_pagination dc_paginationA dc_paginationA06">
                        <li><a href="#" class="previous">Pages</a></li>
                        <li><a href="#">1</a></li>
                        <li><a href="#">2</a></li>
                    </ul>
                    <div class="clear"></div>
                </div>
                <div class="clear"></div>
            </div>

            <? foreach ($products as $product): ?>
                <div class="col_1_of_single1 span_1_of_single1">
                    <a href="<?= Url::to('/product/' . $product->url); ?>">
                        <div class="view1 view-fifth1">
                            <div class="top_box">
                                <h3 class="m_1"><?= $product->name ?></h3>
                                <p class="m_2"> </p>
                                <div class="grid_img">
                                    <div class="css3"><?= Html::img($product->getImage($product)); ?></div>
                                    <div class="mask1">
                                        <div class="info">Quick View</div>
                                    </div>
                                </div>
                                <div class="price"><?= $product->price ?> <i class="fa fa-<?= Currency::getCurrency()->code ?>" aria-hidden="true"></i></div>
                            </div>
                        </div>

                    </a>
                    <div class='row'>
                        <div id='add-to-cart-button' class='col-sm-12'>
                            <? if (!Session::isInCart($product->id)): ?>
                                <?=
                                Html::a('<i class="fa fa-plus" aria-hidden="true"></i> В корзину</a>', '#', [
                                    'data-id' => $product->id,
                                    'id' => 'add-to-cart',
                                    'class' => 'btn btn-default text-uppercase'
                                ]);
                                ?> 
                            <? else: ?>
                                Товар в <?=
                                Html::a('корзине', Url::to('/cart'))
                                ?>.
                            <? endif; ?>
                        </div>
                    </div>
                    <div class="clear"></div>
                </div>

            <? endforeach; ?>


            <div class="clear"></div>
        </div>


    </div>
    <div class="clear"></div>
</div>
</div>