<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
?>
<div class="site-contact">
        <div class="alert alert-success hidden"></div>
        <div class="row">
            <div class="col-lg-5">
               <?php $form = ActiveForm::begin(['id' => 'contact', 'options' => ['data' => ['pjax' => true]]]); ?>
                    <?=$form->field($model, 'name', ['enableAjaxValidation' => true])->textInput()->label('Имя') ?>
                    <?=$form->field($model, 'email', ['enableAjaxValidation' => true])->input('email') ?>
                    <?=$form->field($model,'phone', ['enableAjaxValidation' => true])->widget(MaskedInput::className(),['mask'=>'+7 (999) 999-99-99'])->textInput()->label('№ телефона') ?>
                    <?=Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
               <?php $form::end(); ?>
            </div>
        </div>
</div>