<?php

namespace common\models;

use Yii;

/**
 * This is the model class for table "product_to_characteristic".
 *
 * @property int $id
 * @property int $product_id
 * @property int $characteristic_id
 * @property string $value
 * @property string $timestamp
 */
class ProductToCharacteristic extends \yii\db\ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%product_to_characteristic%}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['product_id', 'characteristic_id'], 'integer'],
                [
                    [
                    'timestamp',
                ],
                'date',
                'format' => 'php:Y-m-d H:i:s'
            ],
                [['value'], 'string', 'max' => 225],
        ];
    }

    public function getCharacteristicName() {
        return $this->hasOne(Characteristics::className(), ['id' => 'characteristic_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'product_id' => 'Product ID',
            'characteristic_id' => 'Characteristic ID',
            'value' => 'Value',
            'timestamp' => 'Timestamp',
        ];
    }

}
