<?php

namespace common\models;

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
class Settings extends ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%settings%}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['id'], 'integer'],
                [['parameter', 'value'], 'string'],
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'parameter' => 'Параметр',
            'value' => 'Значение',
        ];
    }

}
