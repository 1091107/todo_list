<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\LoginForm;

$model = new LoginForm();

?>

<div class="row">
    <div class="col-xs-10 col-xs-offset-1 col-sm-8 col-sm-offset-2">

<?php
 $form = ActiveForm::begin([
        'id' => 'login-form',
        'options' => ['class' => 'form-horizontal'],
        'action' => ['login/login'],
    ]);
?>
        <?= $form->field($model, 'username') ?>

        <?= $form->field($model, 'password')->passwordInput() ?>

        <div class="input-group pull-right">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>

<?php ActiveForm::end(); ?>

    </div>
</div>
