<?php

namespace frontend\widgets\mainMenu;

use common\models\Category;

class MainMenu extends \yii\bootstrap\Widget {

    public function init() {
        parent::init();
    }

    public function run() {

        $categories = Category::findAll(['is_active' => 1]);

        return $this->render('mainMenu', [
                    'categories' => $categories,
        ]);
    }
}
