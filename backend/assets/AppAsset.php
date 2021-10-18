<?php

namespace backend\assets;

use Yii;
use yii\web\AssetBundle;

/**
 * Main backend application asset bundle.
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        'css/site.css',
    ];
    public $js = [
    ];

    public function init() {
        $this->includeJs();
        $this->includeCss();
    }

    private function includeJs() {
        $controller = Yii::$app->controller->id;
        $action = Yii::$app->controller->action->id;
    }

    private function includeCss() {
        $controller = Yii::$app->controller->id;
        $action = Yii::$app->controller->action->id;

        if ($controller == 'site') {
            if ($action == "login") {
                $this->css[] = 'css/login.css?v1.00';
                return true;
            }
            return true;
        }
    }

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

}
