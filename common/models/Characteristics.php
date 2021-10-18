<?php

namespace common\models;

use Yii;
use yii\db\ActiveRecord;

class Characteristics extends ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%characteristics%}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['product_id', 'id'], 'integer'],
                [['name'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'name' => 'Название',
        ];
    }

}
