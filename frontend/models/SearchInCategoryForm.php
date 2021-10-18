<?php

namespace frontend\models;

use Yii;
use yii\base\Model;

/**
 * SearchInCategoryForm is the model behind the contact form.
 */
class SearchInCategoryForm extends Model {

    public $price;
    public $new;
    public $sale;
    public $qty;
    public $sortType;
    public $categoryId;
    public $categoryUrl;
    public $minPrice;
    public $maxPrice;

    public function rules() {
        return [
                [['price'], 'safe'],
                [['new', 'sale', 'qty'], 'boolean'],
                [['categoryId', 'sortType'], 'integer'],
                [['minPrice', 'maxPrice', 'categoryUrl'], 'string'],
        ];
    }

    public function attributeLabels() {
        return [
            'price' => 'Цена',
            'new' => 'Новинки',
            'sale' => 'Распродажа',
            'sortType' => 'Тип сортировки',
            'qty' => 'В наличии',
            'categoryId' => 'id категории',
            'categoryUrl' => 'url категории',
        ];
    }

}
