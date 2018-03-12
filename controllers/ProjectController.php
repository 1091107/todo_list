<?php

namespace app\controllers;

use app\models\ProjectEvents;
use yii\web\Controller;
use yii\helpers\Url;

class ProjectController extends Controller
{
    public function actionAdd()
    {
        ProjectEvents::saveProject();

        return $this->redirect(Url::to(["site/index"]));
    }

    public function actionEdit() {
        return ProjectEvents::editProject();
    }

    public function actionDelete() {
        ProjectEvents::deleteProject();

        return $this->redirect(Url::to(["site/index"]));
    }

    public function actionAddtask() {
        return $this->renderPartial('//site/task', ProjectEvents::addTask());
    }

    public function actionDeletetask() {
        ProjectEvents::deleteTask();
    }

    public function actionCompletetask() {
        return $this->renderPartial('//site/task', ProjectEvents::completeTask());
    }
}