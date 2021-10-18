<?php

namespace frontend\controllers;

use common\helper\Session;
use common\models\Product;
use yii\web\Controller;
use yii\web\NotFoundHttpException;

/**
 * ProductController
 */
class ProductController extends Controller {

    public function actions() {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    public function actionIndex() {

        $products = Product::find()
                ->with('category')
                ->where(['is_active' => 1])
                ->all();

        return $this->render('index', [
                    'products' => $products
        ]);
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionView($name) {
        if (!$name) {
            throw new NotFoundHttpException;
        }

        $product = Product::find()
                ->with([
                    'images',
                    'productToCharacteristics',
                    'productToCharacteristics.characteristicName'
                ])
                ->where(['url' => $name])
                ->one();

        if (!$product) {
            throw new NotFoundHttpException;
        }

        $parentCategory = '';
        if ($product->category->parent_id) {
            $parentCategory = \common\models\Category::findOne([
                        $product->category->parent_id
            ]);
        }

        $isInCart = Session::isInCart($product->id);

        return $this->render('view', [
                    'product' => $product,
                    'parentCategory' => $parentCategory,
                    'isInCart' => $isInCart,
        ]);
    }

}
