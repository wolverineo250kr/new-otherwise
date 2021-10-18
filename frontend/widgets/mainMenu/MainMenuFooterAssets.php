<?php

namespace frontend\widgets\mainMenu;

class MainMenuFooterAssets extends \yii\web\AssetBundle {

    public $jsOptions = [
        'forceCopy' => true,
        'appendTimestamp' => false,
    ];
    public $sourcePath = "@frontend/widgets/MainMenu/assets";
    public $js = [
        'js/main-menu-footer.js?v1.0',
    ];
    public $css = [
        'css/main-menu-footer.css?v1.0',
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
