<?php

namespace frontend\widgets\mainMenu;

class MainMenuAssets extends \yii\web\AssetBundle {

    public $jsOptions = [
        'forceCopy' => true,
        'appendTimestamp' => false,
    ];
    public $sourcePath = __DIR__."/assets";
    public $js = [
        'js/main-menu.js?v1.02',
    ];
    public $css = [
        'css/main-menu.css?v1.01',
    ];
    public $depends = [
        'yii\web\JqueryAsset'
    ];

}
