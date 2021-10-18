<?php

namespace frontend\models\autocomplete;

use yii;
use yii\base\Model;
use yii\helpers\Url;

class ProductForm extends Model {

    const DISABLED = 0;
    const ACTIVE = 1;

    public $term = null;
    public $is_active = null;
    private $result = [];

    public function rules() {
        return [
                [['term'], 'required'],
                [['is_active'], 'in', 'range' => [self::ACTIVE, self::DISABLED]],
                [['term'], 'trim'],
                ['term', 'string'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function getResult() {
        if (isset($this->term)) {
            $modelEach = \common\models\Product::find()
                    ->where(['is_active' => 1])
                    ->andWhere(['like', 'name', '%' . $this->term . '%', false])
                    ->limit("50")
                    ->each();

            $termKeys = explode(" ", str_replace("/", "", $this->term));

            foreach ($modelEach as $model) {
                $name = preg_replace('/(' . implode('|', $termKeys) . ')/iu', '<strong class="search-excerpt">\0</strong>', $model->name);

                $this->result[] = [
                    'id' => $model->id,
                    'label' => '<div>' . $name . '</div>',
                    'value' => $model->name,
                    'href' => Url::toRoute(['product/' . $model->url]),
                ];
            }

            if (count($this->result) == 0) {
                $this->result[] = [
                    'id' => '',
                    'label' => 'По вашему запросу ничего не найдено',
                    'value' => '',
                    'href' => '#',
                ];
            }
        }
        return $this->result;
    }

}
