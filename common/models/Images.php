<?php

namespace common\models;

use yii\db\ActiveRecord;

class Images extends ActiveRecord {

    /**
     * {@inheritdoc}
     */
    public static function tableName() {
        return '{{%images%}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
                ['id', 'safe'],
                [['name', 'mime_type'], 'string'],
                [
                    [
                    'timestamp',
                ],
                'date',
                'format' => 'php:Y-m-d H:i:s'
            ]
        ];
    }

    public function attributeLabels() {
        return [
            'id' => 'ID',
            'category_id' => 'Id категории',
            'name' => 'Имя',
            'mime_type' => 'Расширение файла',
            'timestamp' => 'Время создания',
        ];
    }

}
