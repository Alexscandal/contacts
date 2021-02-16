<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\widgets\MaskedInput;
?>
        <div class="row">
            <div class="col-lg-5">
               <?php $form = ActiveForm::begin(['action' => ['admin/edit'],'id' => 'user-update-form','validateOnBlur'=>false]); ?>
                    <?=$form->field($user, 'id')->hiddenInput()->label(false)?>
                    <?=$form->field($user, 'name')->textInput(['autofocus' => true])->label('Имя') ?>
                    <?=$form->field($user, 'email')->input('email') ?>
                    <?=$form->field($user,'phone')->widget(MaskedInput::className(),['mask'=>'+7 (999) 999-99-99'])->textInput()->label('№ телефона') ?>
                    <?=Html::submitButton('Отправить', ['class' => 'btn btn-primary']) ?>
               <?php ActiveForm::end(); ?>
            </div>
        </div>
