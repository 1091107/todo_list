<?php
/* @var $projects
 * @var $todo_tasks
 * @var $done_tasks
 */

use yii\helpers\Url;

$this->registerJsFile(
    '@web/js/app.js',
    ['depends' => [\yii\web\JqueryAsset::className()]]
);

?>

<div class="row">
    <?php foreach ($projects as $project): ?>
        <div class="col-xs-12 col-sm-6">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12">
                        <span data-id_project="<?= $project->id ?>">
                            <b><?= $project->name ?></b>
                        </span>
                            <div class="btn-group pull-right">
                                <button type="button"
                                        class="btn btn-primary btn-sm" onclick="editProject(<?= $project->id ?>)">
                                    <span class="glyphicon glyphicon-pencil"></span>
                                </button>
                                <a href="<?= Url::to(['project/delete']) ?>?id=<?= $project->id ?>" type="button"
                                   name="delete_project" class="btn btn-danger btn-sm"
                                   data-id_project="<?= $project->id ?>">
                                    <span class="glyphicon glyphicon-trash"></span>
                                </a>
                            </div>
                        </div>
                        <div class="col-xs-10" data-id_project="<?= $project->id ?>" hidden>
                            <form id="form_edit_project_<?= $project->id ?>" method="post"
                                  class="navbar-form navbar-left">
                                <input type="text" name="name" class="form-control">
                                <button type="button" class="btn btn-primary"
                                        onclick="saveProject(<?= $project->id ?>)">
                                    <span class="glyphicon glyphicon-floppy-disk"></button>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                    Todo
                    <hr/>
                    <div class="row" data-id="todo_tasks_<?= $project->id ?>">
                        <?php foreach ($todo_tasks[$project->id] as $task): ?>
                            <div class="col-xs-12" data-id="task_<?= $task->id ?>">
                                <div class="form-group">
                                    <?= $task->description ?>
                                    <div class="btn-group pull-right">
                                        <button type="button" class="btn btn-success btn-xs"
                                                onclick="completeTask(<?= $task->id ?>, <?= $project->id ?>)">
                                            <span class="glyphicon glyphicon-ok"></span>
                                        </button>
                                        <button type="button" class="btn btn-danger btn-xs"
                                                onclick="deleteTask(<?= $task->id ?>)">
                                            <span class="glyphicon glyphicon-trash"></span>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <hr/>
                    Done
                    <hr/>
                    <div class="row" data-id="done_tasks_<?= $project->id ?>">
                        <?php foreach ($done_tasks[$project->id] as $task): ?>
                            <div class="col-xs-12">
                                <div class="form-group">
                                    <?= $task->description ?>
                                </div>
                            </div>
                        <?php endforeach; ?>
                    </div>
                </div>
                <div class="panel-heading">
                    <div class="row">
                        <div class="col-xs-12">
                            <form id="form_add_task_<?= $project->id ?>">
                                <div class="form-group">
                                    <div class="col-xs-9 col-md-offset-3 col-md-7 col-lg-offset-4 col-lg-6">
                                        <input type="text" name="task_description" class="form-control"
                                               placeholder="Task">
                                    </div>
                                    <div class="col-xs-1">
                                        <button type="button" class="btn btn-primary"
                                                onclick="createTask(<?= $project->id ?>)">Add
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</div>