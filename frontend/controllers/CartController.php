<?php

namespace frontend\controllers;

use common\models\Product;
use Yii;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;

/**
 * CartController
 */
class CartController extends Controller
{

    public function actions()
    {
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

    public function actionIndex()
    {
        return $this->render('index');
    }

    public function actionAddToCart()
    {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException;
        }

        \Yii::$app->response->format = Response::FORMAT_JSON;
        $id = (int)Yii::$app->request->post('id');
        $qty = (int)Yii::$app->request->post('qty');

        $product = Product::findOne($id);

        if (!$product) {
            throw new NotFoundHttpException;
        }

        if ($product->qty < 1) {
            return false;
        }

        $session = Yii::$app->session;
        $session->open();

        if (isset($_SESSION['cart'][$product->id])) {
            $_SESSION['cart'][$product->id]['qty'] += $qty;
        } else {
            $price = (int)$product->price_sale > 0 ? (int)$product->price_sale : (int)$product->price;

            $_SESSION['cart'][$product->id] = [
                'id' => $product->id,
                'qty' => $qty,
                'name' => $product->name,
                'price' => $price,
                'url' => $product->url,
                'img' => \common\models\Product::getMainImage($product->id),
            ];
        }
        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;
        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] + $qty * $price : $qty * $price;

        return [
            'cartItems' => count($_SESSION['cart']),
            'session' => $_SESSION,
        ];
    }

    public function actionDeleteItem()
    {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException;
        }
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $id = (int)Yii::$app->request->post('id');
        if (!isset($_SESSION['cart'][$id])) {
            return false;
        }

        $_SESSION['cart.qty'] = $_SESSION['cart.qty'] - $_SESSION['cart'][$id]['qty'];
        $sumMinus = $_SESSION['cart'][$id]['qty'] * $_SESSION['cart'][$id]['price'];

        unset($_SESSION['cart'][$id]);

        $result = [
            'total' => $_SESSION['cart.sum'] -= $sumMinus,
            'qty' => count($_SESSION['cart']),
        ];

        return $result;
    }

    public function actionChangeAmount()
    {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException;
        }
        \Yii::$app->response->format = Response::FORMAT_JSON;
        $id = (int)Yii::$app->request->post('id');
        $product = Product::findOne([$id]);
        if (!$product) {
            return false;
        }

        $class = (string)Yii::$app->request->post('class');

        if (!isset($_SESSION['cart'][$id])) {
            return false;
        }

        $newSubTotal = 0;
        $price = (int)$product->price_sale > 0 ? (int)$product->price_sale : (int)$product->price;
        if ($class == 'minus') {
            $_SESSION['cart'][$id]['qty'] -= 1;
            $newSubTotal = $_SESSION['cart'][$id]['qty'] * $price;
        } elseif ($class == 'plus') {
            $_SESSION['cart'][$id]['qty'] += 1;
            $newSubTotal = $_SESSION['cart'][$id]['qty'] * $price;
        } else {
            $_SESSION['cart'][$id]['qty'] = (int)Yii::$app->request->post('qty');
            $newSubTotal = $_SESSION['cart'][$id]['qty'] * $price;
        }

        $_SESSION['cart.sum'] = 0;

        foreach ($_SESSION['cart'] as $cart) {
            $_SESSION['cart.sum'] += $cart['qty'] * $cart['price'];
        }

        $result = [
            'total' => $_SESSION['cart.sum'],
            'subTotal' => $newSubTotal,
            'qty' => $_SESSION['cart'][$id]['qty'],
        ];

        return $result;
    }

    public function actionDestroy()
    {
        if (Yii::$app->request->isAjax) {
            $session = Yii::$app->session;
            $session->open();
            $session->remove('cart');
            $session->remove('cart.qty');
            $session->remove('cart.sum');
            return true;
        }
        return false;
    }

    public function actionShowCart()
    {
        $session = Yii::$app->session;
        $session->open();
        if (!$session['cart']) {
            return false;
        }
        $this->layout = false;
        return $this->render('cart-modal', [
            'session' => $session
        ]);
    }

}
