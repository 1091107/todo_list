<?php
/* @var $projects
 */

use yii\helpers\Url;
use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\bootstrap\ButtonDropdown;
use app\models\NewProjectForm;

ButtonDropdown::widget();

$model = new NewProjectForm();

?>

<div class="panel panel-default">
    <div class="panel-heading">
        <div class="row">
            <div class="col-lg-5 col-md-4 col-sm-2">
                <h4 style="color: royalblue;">TODOS.LIST</h4>
            </div>
            <div class="col-lg-5 col-md-6 col-sm-8">
                <?php
                $form = ActiveForm::begin([
                    'id' => 'form_new_project',
                    'options' => ['class' => 'navbar-form navbar-left'],
                    'action' => ['project/add'],
                ]);
                ?>

                <?= $form->field($model, 'name')->textInput()->input(
                    'text', [
                    'placeholder' => 'Project Name',
                ]);
                ?>
                <?= Html::submitButton('Create', ['class' => 'btn btn-primary']) ?>

                <?php ActiveForm::end(); ?>

            </div>
            <div class="col-xs-1">
                <div class="dropdown">
                    <button class="btn btn-default btn-sm dropdown-toggle" type="button" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        Olá <?= $name ?>
                        <span class="caret"></span></button>
                    <ul class="dropdown-menu">
                        <li><a name="logout" href="<?= Url::to(['login/logout']) ?>">Sair</a></li>
                    </ul>
                </div>


            </div>
        </div>
    </div>
    <div class="panel-body">
        <h3 style="text-align: center;">PROJECTS</h3>
        <hr/>
        <div class="row projects">
            <?= $projects ?>
        </div>
    </div>
</div>
