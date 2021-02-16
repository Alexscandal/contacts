<?php
use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
?>
<div class="site-login">
    <h1>Авторизация</h1>

    <?php $form = ActiveForm::begin([
          'action' => ['admin/login'],
        'layout' => 'horizontal',
        'fieldConfig' => [
            'template' => "{label}\n<div class=\"col-lg-3\">{input}</div>\n<div class=\"col-lg-8\">{error}</div>",
            'labelOptions' => ['class' => 'col-lg-1 control-label'],
        ],
    ]); ?>

        <?=$form->field($model, 'username')->textInput(['autofocus' => true])?>

        <?=$form->field($model, 'password')->passwordInput()?>

        <div class="form-group">
            <div class="col-lg-offset-1 col-lg-11">
                <?= Html::submitButton('Войти', ['class' => 'btn btn-primary']) ?>
            </div>
        </div>

    <?php ActiveForm::end(); ?>
</div>
