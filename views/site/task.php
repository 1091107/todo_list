<?php
/*
 * @var $task
 */

?>

<div class="col-xs-12" data-id="task_<?= $task['id'] ?>">
    <div class="form-group">
        <?= $task['description'] ?>

        <?php
        if (isset($task['id_project'])) {
            ?>

            <div class="btn-group pull-right">
                <button type="button" class="btn btn-success btn-xs"
                        onclick="completeTask(<?= $task['id'] ?>, <?= $task['id_project'] ?>)">
                    <span class="glyphicon glyphicon-ok"></span>
                </button>
                <button type="button" class="btn btn-danger btn-xs"
                        onclick="deleteTask(<?= $task['id'] ?>)">
                    <span class="glyphicon glyphicon-trash"></span>
                </button>
            </div>

            <?php
        }
        ?>

    </div>
</div>