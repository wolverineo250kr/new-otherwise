<?php
/* @var $this yii\web\View */

$this->title = 'The New Otherwise';
?>
<div class="site-index">
    <div class="body-content">
        <div class="row">
            <div class="col-sm-3"> 

            </div>
            <div class="col-sm-9">
                <?=
                \aki\imageslider\ImageSlider::widget([
                    'baseUrl' => Yii::getAlias('@web'),
                    'nextPerv' => true,
                    'indicators' => true,
                    'height' => '420px',
                    'classes' => 'img-rounded',
                    'images' => [
                            [
                            'active' => true,
                            'src' => 'image/static/slider/01.jpg',
                            'title' => 'image',
                        ],
                            [
                            'src' => 'image/static/slider/02.jpg',
                            'title' => 'image',
                        ]
                    ],
                ]);
                ?>
            </div>
        </div>

    </div>
</div>
