<?php

use yii\bootstrap\Tabs;

echo Tabs::widget([
    'items' => [
        [
            'label' => 'Registo',
            'content' => $this->render('register'),
            'headerOptions' => ['class' => 'pull-right'],
        ],
        [
            'label' => 'Login',
            'content' => $this->render('login'),
            'active' => true,
            'headerOptions' => ['class' => 'pull-right'],
        ],
    ]
]);

?>
