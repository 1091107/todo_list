<?php

namespace app\models;

use yii\db\ActiveRecord;

class Task extends ActiveRecord
{
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'id_project' => 'Project ID',
            'description' => 'Description',
            'created_date' => 'Created Date',
            'finished_date' => 'Finished Date',
            'done' => 'Done',
        ];
    }

}