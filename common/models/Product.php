<?php

namespace common\models;

use common\helper\Domain;
use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "product".
 *
 * @property string $id
 * @property int $category_id
 * @property string $name
 * @property string $content
 * @property double $price
 * @property string $qty
 * @property string $keywords
 * @property string $description
 * @property string $img
 * @property string $hit
 * @property string $new
 * @property string $sale
 */
class Product extends ActiveRecord {

    const ACTIVE = 1;
    const DISABLED = 0;

    public static function tableName() {
        return '{{%product%}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['category_id', 'name'], 'required'],
                [['name'], 'uniue', 'message' => 'Товар с таким именем уже существует'],
                [['category_id', 'qty', 'id'], 'integer'],
                ['is_active', 'boolean'],
                [['content', 'hit', 'new', 'sale'], 'string'],
                [['price', 'price_sale'], 'number'],
                [['price', 'price_sale'], 'priceOfSaleCompare'],
                [
                    [
                    'timestamp',
                    'timestamp_update',
                ],
                'date',
                'format' => 'php:Y-m-d H:i:s'
            ],
                [['name', 'keywords', 'description', 'img'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function priceOfSaleCompare($attribite) {
        if ($this->price < $this->price_sale) {
            $this->addError($attribute, 'Цена распродажи не может быть выше основной!');
        }
    }

    public function getImage($model) {

        $image = Domain::host() . '://' . Domain::base() . '/image/dynamic/' . $model->category_id . '/' . $model->id . '/' . $model->images;

        if (!@getimagesize($image)) {
            $image = Domain::host() . '://' . Domain::base() . '/image/bg/' . Yii::$app->params['noImage'];
        }

        return $image;
    }

    public static function getMainImage($modelId) {
        $image = Domain::host() . '://' . Domain::base() . '/image/bg/' . Yii::$app->params['noImage'];

        $product = Product::find()
                ->with(['productToCategory', 'images', 'productToImage'])
                ->where(['id' => $modelId])
                ->one();

        if (!$product || empty($product->images)) {
            return $image;
        }

        $imageId = '';
        foreach ($product->productToImage as $productToImage) {
            if ($productToImage->is_main) {
                $imageId = $productToImage->image_id;
            }
        }

        foreach ($product->images as $imageToUse) {
            $image = Domain::host() . '://' . Domain::base() . '/image/dynamic/' . $product->productToCategory->category_id . '/' . $modelId . '/' . $imageToUse->file_name;
        }

        return $image;
    }

    public function getProductToCategory() {
        return $this->hasOne(ProductToCategory::className(), ['product_id' => 'id']);
    }

    public function getProductToImage() {
        return $this->hasMany(ProductToImages::className(), ['product_id' => 'id']);
    }

    public function getImages() {
        return $this->hasMany(Images::className(), ['id' => 'image_id'])
                        ->via('productToImage');
    }

    public function getProductToCharacteristics() {
        return $this->hasMany(ProductToCharacteristic::className(), ['product_id' => 'id']);
    }

    public function getCategory() {
        return $this->hasOne(Category::className(), ['id' => 'category_id'])
                        ->via('productToCategory');
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'category_id' => 'Id категории',
            'name' => 'Name',
            'content' => 'Content',
            'price' => 'Цена',
            'price_sale' => 'Цена распродажи',
            'qty' => 'Количество',
            'keywords' => 'Ключевые слова',
            'description' => 'Описание товара',
            'img' => 'Изображение',
            'hit' => 'Hit',
            'new' => 'Новинка',
            'sale' => 'Распродажа',
        ];
    }

}
