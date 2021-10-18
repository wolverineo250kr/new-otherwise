<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Category extends ActiveRecord {

    const ACTIVE = 1;
    const DISABLED = 0;
    
    public static function tableName() {
        return '{{%category%}}';
    }

    public function rules() {
        return [
                [['category_id', 'name'], 'required'],
                [['parent_id', 'id'], 'integer'],
                ['is_active', 'boolean'],
                [
                    [
                    'name',
                    'keywords',
                    'description'
                ],
                'string'
            ],
                [
                    [
                    'timestamp',
                    'timestamp_update',
                ],
                'date',
                'format' => 'php:Y-m-d H:i:s'
            ]
        ];
    }

    public function getProductToCategory() {
        return $this->hasMany(ProductToCategory::className(), ['category_id' => 'id']);
    }

    public function getProducts() {
        return $this->hasMany(Product::className(), ['id' => 'product_id'])
                        ->via('productToCategory');
    }
    
      public function getSortResult() {
          
      }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'parent_id' => 'Id категории',
            'name' => 'Name',
            'keywords' => 'Ключевые слова',
            'description' => 'Описание товара',
            'is_active' => 'активность',
            'timestamp' => 'timestamp',
            'timestamp_update' => 'timestamp_update',
        ];
    }

}
