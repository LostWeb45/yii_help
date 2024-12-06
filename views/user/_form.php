<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\widgets\MaskedInput;

/** @var yii\web\View $this */
/** @var app\models\User $model */
/** @var yii\widgets\ActiveForm $form */
?>

<style>
    .help-block {
        color: red;
    }

    .has-error .form-control {
        border-color: red;
    }
</style>

<div class="user-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'Name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Surname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Lastname')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'Telephone')->widget(
        MaskedInput::className(),
        ['mask' => '+7 (999) 999-99-99']
    )->textInput(['placeholder' => '+7 (999) 999-99-99', 'class' => '']) ?>

    <?= $form->field($model, 'Password')->passwordInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passwordConf')->passwordInput(['maxlength' => true])->label('Подтвердите пароль') ?>

    <?= $form->field($model, 'Email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'agree')->checkbox() ?>


    <div class="form-group">
        <?= Html::submitButton('Зарегистрироваться', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>