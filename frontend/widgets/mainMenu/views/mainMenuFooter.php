<?

use \frontend\widgets\mainMenu\MainMenuFooterAssets;

MainMenuFooterAssets::register($this);
?>
<ul>
    <? foreach ($categories as $category): ?>
        <? if ($category->parent_id == 0): ?>
            <li class="parent-category">
                <?=
                yii\helpers\Html::a($category->name, '/category/' . $category->url)
                ?>
                <ul class='sub-categories' style="display: none;">
                    <? foreach ($categories as $subCategory): ?>
                        <? if ($subCategory->parent_id == $category->id): ?>
                            <li>
                                <?=
                                yii\helpers\Html::a($subCategory->name, '/category/' . $subCategory->url)
                                ?>
                            </li>

                        <? endif; ?>
                    <? endforeach ?>
                </ul>
            </li>
        <? endif; ?>
    <? endforeach; ?> 
</ul>
<!--<div class="header-bottom">
    <div class="wrap">
        <div class='category-list-button text-uppercase'>
            <i class="fa fa-bars hidden-xs"></i>  <span>Категории</span>
            <i class="fa fa-angle-double-down" aria-hidden="true"></i>
        </div>
        <div id='category-list' class='category-list opened'>
            <ul>
<? foreach ($categories as $category): ?>
    <? if ($category->parent_id == 0): ?>
                                                                <li>
        <?=
        yii\helpers\Html::a($category->name, '/category/' . $category->url)
        ?>
                                                                </li>
    <? endif; ?>
<? endforeach; ?> 
            </ul>
        </div>
        <ul class='text-uppercase main-links'>
            <li>                 
<?=
yii\helpers\Html::a('Главная', '/category/' . '/')
?>
            </li>  
            <li>                 
<?=
yii\helpers\Html::a('О нас', '/category/' . '/')
?>
            </li> 
            <li>                 
<?=
yii\helpers\Html::a('Доставка и оплата', '/category/' . '/')
?>
            </li> 
            <li>                 
<?=
yii\helpers\Html::a('Контакты', '/category/' . '/')
?>
            </li> 
        </ul> 

         start header menu 
        <ul class="megamenu skyblue"><li class="showhide" style="display: none;"><span class="title text-uppercase">Меню</span><span class="icon1"></span><span class="icon2"></span></li>
            <li><a class="color1" href="/">Главная</a></li>
<? $i = 2; ?>
<? foreach ($categories as $category): ?>
    <? if ($category->parent_id == 0): ?>
                                                                                                                                                                                    <li class="grid">
        <?=
        yii\helpers\Html::a($category->name, '/category/' . $category->url, [
            'class' => 'color' . $i
        ])
        ?>
                                                                                                                                                                                        <div class="megapanel">
                                                                                                                                                                                            <div class="row">
                                                                                                                                                                                                <div class="col-sm-12">
                                                                                                                                                                                                    <div class="h_nav">

                                                                                                                                                                                                    </div>
                                                                                                                                                                                                </div>
                                                                                                                                                                                            </div>
                                                                                                                                                                                        </div>
                                                                                                                                                                                    </li>
    <? endif; ?>
    <? $i++; ?>
<? endforeach; ?>
        </ul>
        <div class="clear"></div>
    </div>
</div>-->