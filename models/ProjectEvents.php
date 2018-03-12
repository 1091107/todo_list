<?php

namespace app\models;

use yii;

class ProjectEvents extends Project
{
    public static function getProjects()
    {

        $session = Yii::$app->session;

        if ($session->isActive) {
            $session->open();
        }

        $projects = Project::find()
            ->orderBy('name')
            ->where(['id_user' => $session->get('id')])
            ->all();

        $session->close();

        $todo_tasks = [];
        $done_tasks = [];

        foreach ($projects as $project) {
            $todo_tasks[$project->id] = Task::findAll([
                'id_project' => $project->id,
                'done' => 0
            ]);

            $done_tasks[$project->id] = Task::findAll([
                'id_project' => $project->id,
                'done' => 1
            ]);
        }

        return [
            'projects' => $projects,
            'todo_tasks' => $todo_tasks,
            'done_tasks' => $done_tasks
        ];
    }

    public static function saveProject()
    {
        $session = Yii::$app->session;

        if (!$session->isActive) {
            $session->open();
        }

        $id_user = $session->get('id');

        $session->close();

        $post = Yii::$app->request->post();

        $model = new NewProjectForm();

        if ($model->load($post)) {
            $project = new Project([
                'id_user' => $id_user,
                'name' => $model->name,
            ]);

            $project->save();
        }
    }

    public static function editProject()
    {
        $post = Yii::$app->request->post();

        $project = Project::findOne($post['id']);

        $project->name = $post['name'];

        $project->save();
    }

    public static function deleteProject()
    {
        $id = Yii::$app->request->get('id');

        Project::findOne($id)->delete();
    }

    public static function addTask()
    {
        $post = Yii::$app->request->post();

        $task = new Task([
            'id_project' => $post['id_project'],
            'description' => $post['description'],
            'done' => 0,
            'created_date' => date("Y-m-d H:i:s"),
        ]);

        $task->save();

        return [
            'task' => [
                'id' => $task->id,
                'description' => $task->description,
                'id_project' => $task->id_project,
            ]
        ];
    }

    public static function deleteTask()
    {
        $id = Yii::$app->request->post('id');

        Task::findOne($id)->delete();
    }

    public static function completeTask()
    {
        $id = Yii::$app->request->post('id');

        $task = Task::findOne($id);

        $task->done = 1;

        $task->save();

        return [
            'task' => [
                'id' => $task->id,
                'description' => $task->description,
            ]
        ];
    }

}