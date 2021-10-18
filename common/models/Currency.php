<?php

namespace common\models;

use Yii;

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
class Currency extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%currency%}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                ['id', 'integer'],
                [['is_active', 'is_in_use'], 'boolean'],
                ['name', 'string'],
        ];
    }

    public static function getCurrency() {
        return self::findOne(['is_in_use' => 1]);
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'is_active' => 'Активность',
            'name' => 'Валюта',
            'is_in_use' => 'Основная валюта',
        ];
    }

}
