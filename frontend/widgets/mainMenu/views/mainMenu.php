<?

use \frontend\widgets\mainMenu\MainMenuAssets;

MainMenuAssets::register($this);
?>

<div class="header-bottom">
    <div class="wrap">
        <div class='category-list-button text-uppercase'>
            <i class="fa fa-bars hidden-xs"></i>  <span>Категории</span>
            <i class="fa fa-angle-double-down" aria-hidden="true"></i>
        </div> 
        <div id='category-list' class='category-list <? if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index'): ?>
                 opened
             <? endif; ?>' 
             <? if (Yii::$app->controller->id == 'site' && Yii::$app->controller->action->id == 'index'): ?>
             <? else: ?>
                 style="display: none;"
             <? endif; ?>>
            <ul>               
                <? foreach ($categories as $category): ?>
                    <? if ($category->parent_id == 0): ?>
                        <? $subCategoryExist = 0; ?>
                        <li>
                            <?=
                            yii\helpers\Html::a($category->name, '/category/' . $category->url)
                            ?>
                            <ul class='sub-menu' style="display: none;">
                                <? foreach ($categories as $subCategory): ?>
                                    <? if ($subCategory->parent_id == $category->id): ?>
                                        <li>
                                            <?=
                                            yii\helpers\Html::a($subCategory->name, '/category/' . $subCategory->url)
                                            ?>
                                        </li>
                                        <? $subCategoryExist = 1; ?>
                                    <? endif; ?>                                
                                <? endforeach ?>
                            </ul>
                            <i class="fa fa-angle-double-right hidden-xs <? if ($subCategoryExist == 0): ?>hidden<? endif; ?>" aria-hidden="true"></i>
                        </li>
                    <? endif; ?>
                <? endforeach; ?> 
            </ul>
        </div>
        <ul class='text-uppercase main-links'>
            <li>                 
                <?=
                yii\helpers\Html::a('Главная', '/')
                ?>
            </li>  
            <li>                 
                <?=
                yii\helpers\Html::a('О нас', '/')
                ?>
            </li> 
            <li>                 
                <?=
                yii\helpers\Html::a('Доставка и оплата', '/')
                ?>
            </li> 
            <li>                 
                <?=
                yii\helpers\Html::a('Контакты', '/')
                ?>
            </li> 
        </ul> 
        <!-- start header menu -->
<!--        <ul class="megamenu skyblue"><li class="showhide" style="display: none;"><span class="title text-uppercase">Меню</span><span class="icon1"></span><span class="icon2"></span></li>
            <li><a class="color1" href="/">Главная</a></li>
        <? $i = 2; ?>
        <? foreach ($categories as $category): ?>
            <? if ($category->parent_id == 0): ?>
                                                                                                                                                                                                                                                                                                                                                                    <li class="grid">
                <?=
                yii\helpers\Html::a($category->name, '/category/' . $category->url, [
                    'class' => 'color' . $i
                ])
                ?>                                                                                                                                                                                                                                                                                                                                                            <div class="h_nav">
                <? foreach ($categories as $subCategory): ?>
                    <? if ($subCategory->parent_id == $category->id): ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                <ul>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                    <li>
                        <?=
                        yii\helpers\Html::a($subCategory->name, '/category/' . $subCategory->url)
                        ?>
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                  </ul>
                    <? endif; ?>
                <? endforeach ?>                                                                                                                                     </li>
            <? endif; ?>
            <? $i++; ?>
        <? endforeach; ?>
        </ul>-->
        <div class="clear"></div>
    </div>
</div>