<div class="row">
    <?php foreach($projects as $project): ?>
    <div class="col-xs-12 col-sm-6" data-id_project="{{ project.id }}">
        <div class="panel panel-default">
            <div class="panel-heading">
                <div class="row">
                    <div class="col-xs-12 project_name">
                        <span class="project_name">
                            <b><?= $project->name ?></b>
                        </span>
                        <div class="btn-group pull-right">
                            <button type="button" name="edit_project" class="btn btn-primary btn-sm">
                                <span class="glyphicon glyphicon-pencil"></span>
                            </button>
                            <button type="button" name="delete_project" class="btn btn-danger btn-sm" data-id_project="{{ project.id }}">
                                <span class="glyphicon glyphicon-trash"></span>
                            </button>
                        </div>
                    </div>
                    <div class="col-xs-8 edit_project_name" hidden>
                        <input type="text" name="project_name" class="form-control">
                    </div>
                    <div class="col-xs-2 edit_project_name" hidden>
                        <button type="button" name="save_project" class="btn btn-primary btn-sm" data-id_project="{{ project.id }}">
                            <span class="glyphicon glyphicon-floppy-disk"></span>
                        </button>
                    </div>
                </div>
            </div>
            <div class="panel-body">
                Todo
                <hr/>
                <div class="row">
                    <?php foreach($todo_tasks[$project->id] as $task): ?>
                        <div class="col-xs-12">
                            <div class="form-group">
                                <?= $task->description ?>
                                <div class="btn-group pull-right">
                                    <button type="button" name="complete_task" class="btn btn-success btn-xs" data-id_task="{{ task.id }}">
                                        <span class="glyphicon glyphicon-ok"></span>
                                    </button>
                                    <button type="button" name="delete_task" class="btn btn-danger btn-xs" data-id_task="{{ task.id }}">
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
                <div class="row">
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
                        <form name="form_add_task" data-id_project="{{ project.id }}">
                            <div class="form-group">
                                <div class="col-xs-9 col-md-offset-3 col-md-7 col-lg-offset-4 col-lg-6">
                                    <input type="text" name="task_description" class="form-control" placeholder="Task">
                                </div>
                                <div class="col-xs-1">
                                    <button type="submit" class="btn btn-primary">Add</button>
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