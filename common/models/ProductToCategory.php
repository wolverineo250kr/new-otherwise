<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class ProductToCategory extends ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%product_to_category%}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['category_id', 'product_id'], 'required'],
                [['category_id', 'product_id', 'id'], 'integer'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'product_id' => 'id товара',
            'category_id' => 'id категории',
        ];
    }
}
