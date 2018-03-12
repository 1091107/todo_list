<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\RegisterForm;

$model = new RegisterForm();

?>

<div class="row">
    <div class="col-xs-12 col-sm-10 col-sm-offset-1">

        <?php
        $form = ActiveForm::begin([
            'id' => 'register-form',
            'options' => ['class' => 'form-horizontal'],
            'action' => ['login/register'],
        ]);
        ?>
        <div class="form-group">
            <h3>
                <label class="control-label">
                    Registo
                </label>
            </h3>
        </div>

        <?= $form->field($model, 'name')->textInput()
            ->input('text', ['placeholder' => 'Nome']) ?>
        <?= $form->field($model, 'username')->textInput()
            ->input('text', ['placeholder' => 'Username']) ?>
        <?= $form->field($model, 'password')->passwordInput()
            ->textInput()->input('password', ['placeholder' => 'Password']) ?>
        <?= $form->field($model, 'confirm_password')->passwordInput()
            ->textInput()->input('password', ['placeholder' => 'Confirmar Password']) ?>

        <div class="input-group pull-right">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
        <?php ActiveForm::end(); ?>

    </div>
</div>