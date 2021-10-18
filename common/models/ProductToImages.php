<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class ProductToImages extends ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%product_to_images%}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['image_id', 'product_id'], 'required'],
                [['image_id', 'product_id', 'id'], 'integer'],
        ];
    }
    
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'product_id' => 'id товара',
            'image_id' => 'id изображения',
        ];
    }
}
