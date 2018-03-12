<?php

namespace app\models;

use yii\db\ActiveRecord;
use yii;

class Project extends ActiveRecord
{
    public function attributeLabels() {
        return [
            'id' => 'ID',
            'id_user' => 'User ID',
            'name' => 'Name',
        ];
    }
}