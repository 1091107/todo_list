<?php

namespace app\models;

use yii\base\Model;

class NewProjectForm extends Model
{
    public $name;

    public function rules()
    {
        return [
            ['name', 'required'],
        ];
    }

    public function attributeLabels()
    {
        return [
            'name' => 'New Project',
        ];
    }
}