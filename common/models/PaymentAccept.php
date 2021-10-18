<?php

namespace common\models;

use common\helper\Domain;
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
class PaymentAccept extends ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%payment_accept%}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                [['id'], 'integer'],
                [['name', 'image'], 'string'],
                [['name', 'image'], 'required'],
                [['is_active'], 'boolean'],
        ];
    }

    public function getImage($model) {
        $image = Domain::host() . '://' . Domain::base() . '/image/static/payment-accept/' .$model->image;

        return $image;
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'is_active' => 'Активность',
            'image' => 'Логотип платежной системы',
            'name' => 'Имя',
        ];
    }

}
