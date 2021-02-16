<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\Pjax;
use yii\grid\GridView;
?>
<?php Pjax::begin(['enablePushState' => false]); ?>
    <?= GridView::widget([
        'dataProvider' => $rows,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'attribute' => 'Имя',
                'value' => 'name',
                'filter' => '<input class="form-control" name="filter_name" value="'. $searchModel['name'] .'" type="text">'
            ],
            [
                'attribute' => 'email',
                'value' => 'email',
                'filter' => '<input class="form-control" name="filter_email" value="'. $searchModel['email'] .'" type="text">'
            ],
            [
                'attribute' => '№ телефона',
                'value' => 'phone',
                'filter' => '<input class="form-control" name="filter_phone" value="'. $searchModel['phone'] .'" type="text">'
            ],
            [
            'class' => 'yii\grid\ActionColumn',
            'header'=>'Действия', 
            'headerOptions' => ['width' => '80'],
            'template' => '{update} {delete}',
            ]
        ]
    ]); ?>
<?php Pjax::end(); ?>
