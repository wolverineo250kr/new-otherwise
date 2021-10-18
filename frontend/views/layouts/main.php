<?php
/* @var $this View */
/* @var $content string */

use common\models\Product;
use common\widgets\Alert;
use frontend\assets\AppAsset;
use frontend\widgets\mainMenu\MainMenu;
use frontend\widgets\mainMenu\MainMenuFooter;
use frontend\widgets\pamentAccept\PamentAccept;
use yii\bootstrap\Modal;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\jui\AutoComplete;
use yii\web\JsExpression;
use yii\web\View;
use yii\widgets\Breadcrumbs;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html>
    <head>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
        <link href="css/form.css" rel="stylesheet" type="text/css" media="all" />
        <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700,800' rel='stylesheet' type='text/css'>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <script src="js/jquery.easydropdown.js"></script>
        <script type="text/javascript">
            $(document).ready(function () {
                $(".dropdown img.flag").addClass("flagvisibility");

                $(".dropdown dt a").click(function () {
                    $(".dropdown dd ul").toggle();
                });

                $(".dropdown dd ul li a").click(function () {
                    var text = $(this).html();
                    $(".dropdown dt a span").html(text);
                    $(".dropdown dd ul").hide();
                    $("#result").html("Selected value is: " + getSelectedValue("sample"));
                });

                function getSelectedValue(id) {
                    return $("#" + id).find("dt a span.value").html();
                }

                $(document).bind('click', function (e) {
                    var $clicked = $(e.target);
                    if (!$clicked.parents().hasClass("dropdown"))
                        $(".dropdown dd ul").hide();
                });


                $("#flagSwitcher").click(function () {
                    $(".dropdown img.flag").toggleClass("flagvisibility");
                });
            });
        </script>

        <script type="text/javascript" src="js/jquery.jscrollpane.min.js"></script>
        <script type="text/javascript" id="sourcecode">
            $(function ()
            {
                $('.scroll-pane').jScrollPane();
            });
        </script>
        <!-- top scrolling -->
        <script type="text/javascript" src="js/move-top.js"></script>
        <script type="text/javascript" src="js/easing.js"></script>
        <script type="text/javascript">
            jQuery(document).ready(function ($) {
                $(".scroll").click(function (event) {
                    event.preventDefault();
                    $('html,body').animate({scrollTop: $(this.hash).offset().top}, 1200);
                });
            });
        </script>

        <?= Html::csrfMetaTags() ?>
        <title><?= Html::encode($this->title) ?></title>
        <?php $this->head() ?>
    </head>
    <body>
        <?php $this->beginBody() ?>

        <div class="header-top hidden-xs">       
            <div class="header-nav"> 
                <div class="wrap"> 
                    <div class="contacts hidden-xs"> 
                        <?=
                        Html::a("<i class='fa fa-phone' aria-hidden='true'></i> <span class='hidden-sm'>Phone: " . Yii::$app->params['phone'] . "</span>", 'tel:' . Yii::$app->params['phone'])
                        ?>
                    </div>    
                    <div class="contacts email hidden-xs"> 
                        <?=
                        Html::a("<i class='fa fa-envelope' aria-hidden='true'></i> <span class='hidden-sm'>Email: " . Yii::$app->params['adminEmail'] . "</span>", 'mailto:' . Yii::$app->params['adminEmail'])
                        ?>
                    </div> 
                    <div class="header-nav-submenu">
                        <ul>
                            <li>                 
                                <?=
                                Html::a("<i class='fa fa-user' aria-hidden='true'></i> <span class=''> My account</span>", '#')
                                ?>
                            </li> 
                            <li>                 
                                <?=
                                Html::a("<i class='fa fa-lock' aria-hidden='true'></i> <span class=''> Sign in</span>", '#')
                                ?>
                            </li> 
                        </ul>
                    </div> 
                </div> 
            </div>    
        </div>   
        <div class="header-middle"> 
            <div class="wrap"> 
                <div class="row"> 
                    <div class="col-xs-12 col-sm-3 mobile-line-1">
                        <a href="/" alt="<?= Yii::$app->name ?>" title="<?= Yii::$app->name ?>">
                            <?=
                            Html::img(Url::to('/image/bg/logo.png'));
                            ?>
                        </a>
                    </div> 
                    <div class="col-sm-6">
                        <center> 
                            <div class="search-block">
                                <?=
                                AutoComplete::widget([
                                    'clientOptions' => [
                                        'minLength' => '3',
                                        'source' => Url::toRoute(['site/autocomplete']),
                                        'create' => new JsExpression('function( event, ui ) {
							$("#search-line").autocomplete( "instance" )._renderItem = function( ul, item ) {
								return $( "<li></li>" ).data( "item.autocomplete", item ).append( item.label).appendTo( ul );
							};
						}'),
                                        'select' => new JsExpression('function(event, ui) {
							window.location.href = ui.item.href;
							return false;
						}'),
                                    ],
                                    'options' => [
                                        'id' => 'search-line',
                                        'placeholder' => 'Поиск среди ' . Product::find()
                                                ->where(['is_active' => 1])
                                                ->count() . ' товаров',
                                        'title' => '',
                                        'class' => '',
                                        'autocomplete' => 'off',
                                    ],
                                ]);
                                ?>
                                <i class="fa fa-search"></i>
                            </div> 
                        </center>  
                    </div> 
                    <div class="col-xs-12 col-sm-3 mobile-line-3">
                        <div class="menu-open hidden-sm hidden-md hidden-lg">
                            <i class="fa fa-bars fa-2x" aria-hidden="true"></i>
                        </div>  
                        <div class="cart-block">
                            <div class="item hidden-xs"> 
                                <?=
                                Html::a("<i class='fa fa-heart-o fa-2x' aria-hidden='true'></i>", "#")
                                ?>
                            </div>  
                            <div class="item hidden-sm hidden-md hidden-lg"> 
                                <?=
                                Html::a("<i class='fa fa-search fa-2x' aria-hidden='true'></i>", "#", [
                                    'id' => 'search-call'
                                ])
                                ?>
                            </div>  
                            <div class="item"> 
                                <?=
                                Html::a("<i class='fa fa-shopping-basket fa-2x' aria-hidden='true'></i>", Url::to('/cart'))
                                ?>
                                <a href="<?= Url::to('/cart') ?>">
                                    <span class='cart-count'>
                                        <?= isset($_SESSION['cart']) && $_SESSION['cart'] ? count($_SESSION['cart']) : '0'; ?>
                                    </span>            
                                </a>
                            </div> 
                        </div> 
                    </div> 
                </div>  
            </div>  
            <div class="clear"></div>
        </div>         
    </div>
    <?= MainMenu::widget() ?>
    <div class="wrap">
        <div class="content">

            <?=
            Breadcrumbs::widget([
                'homeLink' => [
                    'label' => Yii::t('yii', 'Главная'),
                    'url' => Yii::$app->homeUrl,
                ],
                'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
            ])
            ?>
            <?= Alert::widget() ?>
            <?= $content ?>

        </div>
    </div>
    <div class="footer">
        <div class="footer-top">
            <div class="wrap">
                <div class='row'>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <h4 class="text-uppercase">
                            Контакты
                        </h4>
                        <div class='line'>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            <p>
                                Адресс: Город, улица, дом
                            </p>
                        </div>
                        <div class='line'>                           
                            <?= Html::a('<i class="fa fa-phone" aria-hidden="true"></i> <span>Телефон: +7999999999</span>', 'tel:+7999999999') ?>
                        </div>
                        <div class='line'>                            
                            <?= Html::a('<i class="fa fa-envelope-o" aria-hidden="true"></i> <span>Email: email@email.loc</span>', 'mailto:email@email.loc') ?>
                        </div>
                        <div class='line'>                            
                            <?= Html::a('<i class="fa fa-skype" aria-hidden="true"></i> <span>Skype: yourskypeid</span>', 'skype:live:yourskypeid?call') ?>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <h4 class="text-uppercase">
                            Меню
                        </h4>
                        <ul>
                            <li>
                                <?= Html::a('Главная', '#') ?>
                            </li>
                            <li>
                                <?= Html::a('О нас', '#') ?>
                            </li>
                            <li>
                                <?= Html::a('Доставка и оплата', '#') ?>
                            </li>
                            <li>
                                <?= Html::a('Контакты', '#') ?>
                            </li>
                        </ul>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <h4 class="text-uppercase">
                            Категории
                        </h4>
                        <?= MainMenuFooter::widget() ?>
                    </div>
                    <div class="col-xs-12 col-sm-6 col-md-3">
                        <h4 class="text-uppercase">
                            Рассылка
                        </h4>
                        <p>
                            Stay up-to-date with our company news, new 
                            products and exclusive offers
                        </p>
                    </div>
                    <div class="clear"></div>
                </div>
            </div>
        </div>
        <div class="footer-middle">
            <div class="wrap">
                <div class='payment-accept'>
                    <?= PamentAccept::widget() ?>
                </div>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="footer-bottom">
        <div class="wrap text-center">

            <ul>
                <li>
                    <?= Html::a('Sitemap', '#') ?>
                </li>
                <li>
                    <?= Html::a('Term and use', '#') ?>                    
                </li>
                <li>
                    <?= Html::a('Delivery', '#') ?>   
                </li>
                <li>
                    <?= Html::a(' Customer care', '#') ?>   
                </li>
            </ul>
            <br/>
            Copyright <?= date('Y') ?> Amazonas Co., LTD. All rights reserved
            <br>
            Website is developed by Prestashop. All images used in the demo website are for preview purpose only and not included in the download file.
            <div class="clear"></div>
        </div>
    </div>
</div>

</div>

<?
Modal::Begin([
    'header' => '<h2>Кладезь товаров</h2>',
    'id' => 'cart',
    'size' => 'modal-lg',
    'footer' => '<button type="button" class="btn btn-default" data-dismiss="modal">Продолжить покупки</button>
		<a href="' . Url::to(['/cart']) . '" class="btn btn-success">Оформить заказ</a>
		<button type="button" class="btn btn-danger" id="destroy">Опустошить корзину</button>',
]);

Modal::end();
?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
