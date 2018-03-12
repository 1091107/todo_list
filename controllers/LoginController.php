<?php

namespace app\controllers;

use app\models\RegisterForm;
use yii;
use yii\web\Controller;
use app\models\User;
use app\models\LoginForm;
use yii\helpers\Url;

class LoginController extends Controller
{
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {

            return $this->redirect(Url::to(['site/index']));
        }

        $model = new LoginForm();
        $post = Yii::$app->request->post();

        if ($model->load($post)) {
            if($model->login()) {
                return $this->redirect(Url::to(["site/index"]));
            }
        }

        var_dump($model->errors);die;
    }

    public function actionRegister() {

        $model = new RegisterForm();
        $post = Yii::$app->request->post();

        if($model->load($post) && $model->validate()) {

            if(!User::findByUsername($model->username)) {

                $user = new User([
                    'name' => $model->name,
                    'username' => $model->username,
                    'password' => Yii::$app->getSecurity()->generatePasswordHash($model->password),
                ]);

                if ($user->save()) {
                    return $this->render('//site/success', [
                        'result' => 'Novo registo criado com sucesso!',
                        'message' => 'Efetue o login!',
                        'type' => 'success'
                    ]);
                }
            }
            else {
                return $this->render('//site/success', [
                    'result' => 'O utilizador já existe!',
                    'message' => 'Efetue o login!',
                    'type' => 'warning'
                ]);
            }
        }

        return $this->redirect(Url::to(["site/index"]));
    }

    public function actionLogout() {

        $session = Yii::$app->session;
        $session->destroy();

        return $this->redirect(Url::to(["site/index"]));
    }
}