<?php

namespace frontend\assets;

use Yii;
use yii\web\AssetBundle;

/**
 * Main frontend application asset bundle.
 */
class AppAsset extends AssetBundle {

    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $css = [
        '/css/etalage.css',
        '/css/form.css',
        '/css/style.css',
        '/css/main.css',
        '/css/font-awesome/css/font-awesome.css',
    ];
    public $js = [
        '/js/easing.js',
        '/js/jquery.etalage.min.js',
        '/js/jquery.flexisel.js',
        '/js/jquery.jscrollpane.min.js',
        '/js/jquery.wmuSlider.js',
        '/js/move-top.js',
        '/js/main.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init() {
        $this->includeJs();
        $this->includeCss();
    }

    private function includeCss() {
        $controller = Yii::$app->controller->id;
        $action = Yii::$app->controller->action->id;
        if ($controller == "site") {
            if ($action == "index") {
                $this->css[] = "/css/site/index.css?v1.00";
                return true;
            }

            return true;
        }
        if ($controller == "category") {
            if ($action == "index") {
                $this->css[] = "/css/category/index.css?v1.00";
                return true;
            }

            return true;
        }
        if ($controller == "cart") {
            if ($action == "index") {
                $this->css[] = "/css/cart/index.css?v1.00";
                return true;
            }

            return true;
        }

        if ($controller == "product") {
            if ($action == "index") {
                $this->css[] = "/css/product/index.css?v1.00";
                return true;
            }

            if ($action == "view") {
                $this->css[] = "/css/product/view.css?v1.00";
                $this->css[] = "/css/jquery.fancybox.min.css?v1.00";
                return true;
            }

            return true;
        }
    }

    private function includeJs() {
        $controller = Yii::$app->controller->id;
        $action = Yii::$app->controller->action->id;
        if ($controller == "category") {
            if ($action == "index") {
                $this->js[] = "/js/category/index.js?v1.00";
                return true;
            }

            return true;
        }
        if ($controller == "cart") {
            if ($action == "index") {
                $this->js[] = "/js/cart/index.js?v1.00";
                return true;
            }

            return true;
        }
        if ($controller == "product") {
            if ($action == "index") {
                $this->js[] = "/js/product/index.js?v1.00";
                return true;
            }

            if ($action == "view") {
                $this->js[] = "/js/product/view.js?v1.00";
                $this->js[] = "/js/jquery.fancybox.min.js?v1.00";
                return true;
            }

            return true;
        }
        return true;
    }

}
