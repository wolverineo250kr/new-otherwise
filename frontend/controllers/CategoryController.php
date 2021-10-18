<?php

namespace frontend\controllers;

use common\models\Category;
use common\models\Currency;
use common\models\Product;
use frontend\models\SearchInCategoryForm;
use Yii;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\Response;
use yii\web\Session;

/**
 * CategoryController
 */
class CategoryController extends Controller {

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

    public function actionIndex($name) {
        if (!$name) {
            throw new NotFoundHttpException();
        }

        $model = new SearchInCategoryForm;

        if (Yii::$app->request->isAjax) {
            $params = Yii::$app->request->post('SearchInCategoryForm');
        }

        $query = Product::find();
        $query->joinWith('category');
        $query->where([Category::tableName() . '.is_active' => 1]);
        if (Yii::$app->request->isAjax) {
            if ((int) $params['qty']) {
                $query->andWhere(['>', 'qty', 0]);
            }
            if ((int) $params['new']) {
                $query->andWhere(['new' => '1']);
            }
            if ((int) $params['sale']) {
                $query->andWhere(['sale' => '1']);
            }
            if ((int) $params['sortType'] == 2) {
                $query->orderBy(['price' => SORT_ASC]);
            } elseif ($params['sortType'] == 3) {
                $query->orderBy(['price' => SORT_DESC]);
            }
        }
        $query->andWhere([Category::tableName() . '.url' => $name]);
        $query->andWhere([Product::tableName() . '.is_active' => 1]);

        $countQuery = clone $query;
        $pages = new \yii\data\Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 20,
        ]);
        $pages->pageSizeParam = 1;
        $products = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        if (Yii::$app->request->isAjax) {
            return $this->renderPartial('_item', [
                        'products' => $products,
                        'pages' => $pages,
            ]);
        }

        $category = Category::find()
                ->with('products')
                ->where(['is_active' => 1])
                ->andWhere(['url' => $name])
                ->one();

        $prices = [];
        foreach ($category->products as $product) {
            if ($product->is_active) {
                $prices[] = $product->sale ? $product->price_sale : $product->price;
            }
        }

        asort($prices);
        $prices = array_values($prices);
        $minPrice = array_shift($prices);
        $maxPrice = array_pop($prices);

        if (!$category) {
            throw new NotFoundHttpException();
        }

        $parentCategory = '';
        if ($category->parent_id) {
            $parentCategory = Category::findOne([
                        $category->parent_id
            ]);
        }

        return $this->render('index', [
                    'category' => $category,
                    'products' => $products,
                    'pages' => $pages,
                    'model' => $model,
                    'parentCategory' => $parentCategory,
                    'minPrice' => $minPrice,
                    'maxPrice' => $maxPrice,
        ]);
    }

    public function actionSearch() {
        if (!Yii::$app->request->isAjax) {
            throw new NotFoundHttpException;
        }
        Yii::$app->response->format = Response::FORMAT_JSON;

        $params = Yii::$app->request->post('SearchInCategoryForm');

        $query = Product::find();
        $query->joinWith('category');
        $query->where([Category::tableName() . '.is_active' => Category::ACTIVE]);
        $query->andWhere([Category::tableName() . '.id' => $params["categoryId"]]);
        if ((int) $params['qty']) {
            $query->andWhere(['>', 'qty', 0]);
        }
        if ((int) $params['new']) {
            $query->andWhere(['new' => 1]);
        }
        if ((int) $params['sale']) {
            $query->andWhere(['sale' => 1]);
        }
        $query->andWhere(['>=', 'price', $params["minPrice"]]);
        $query->andWhere(['<=', 'price', $params["maxPrice"]]);
        $query->andWhere([Product::tableName() . '.is_active' => Product::ACTIVE]);
        
        if ((int) $params['sortType'] === 2) {
            $query->orderBy(['price' => SORT_ASC, 'sale' => SORT_DESC]);
        } elseif ((int) $params['sortType'] === 3) {
            $query->orderBy(['price' => SORT_DESC, 'sale' => SORT_ASC]);
        }

        $countQuery = clone $query;
        $pages = new \yii\data\Pagination([
            'totalCount' => $countQuery->count(),
            'pageSize' => 20,
            'route' => Yii::$app->controller->id . '/' . $params["categoryUrl"]
        ]);
        
        $pages->pageSizeParam = 1;
        $products = $query->offset($pages->offset)
                ->limit($pages->limit)
                ->all();

        return [
            'html' => $this->renderAjax('_item', [
                'params' => $params,
                'products' => $products,
                'pages' => $pages,
            ]),
            'pages' => $pages,
            'products' => $products,
        ];
    }

    /**
     * Displays homepage.
     *
     * @return mixed
     */
    public function actionView() {
        $id = Yii::$app->request->get('id');

        if (!$id) {
            throw new NotFoundHttpException;
        }

        $product = Product::findOne($id);

        if (!$product) {
            throw new NotFoundHttpException;
        }

        return $this->render('view', [
                    'product' => $product
        ]);
    }

}
