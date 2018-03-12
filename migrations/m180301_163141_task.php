<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180301_163141_task
 */
class m180301_163141_task extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('task',[
            'id' => Schema::TYPE_PK,
            'id_project' => Schema::TYPE_INTEGER . ' not null',
            'description' => Schema::TYPE_STRING . ' not null',
            'created_date' => Schema::TYPE_DATETIME . ' not null',
            'finished_date' => Schema::TYPE_DATETIME . ' default null',
            'done' => Schema::TYPE_SMALLINT . ' not null default 0',
        ]);

        $this->addForeignKey(
            'fk-task-id_project',
            'task',
            'id_project',
            'project',
            'id',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey(
            'fk-task-id_project',
            'task'
        );

        $this->dropTable('task');
    }

    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('task',[
            'id' => Schema::TYPE_PK,
            'id_project' => Schema::TYPE_INTEGER . ' not null',
            'description' => Schema::TYPE_STRING . ' not null',
            'created_date' => Schema::TYPE_DATETIME . ' not null',
            'finished_date' => Schema::TYPE_DATETIME . ' default null',
            'done' => Schema::TYPE_SMALLINT . ' not null default 0',
        ]);

        $this->addForeignKey(
            'fk-task-id_project',
            'task',
            'id_project',
            'project',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-task-id_project',
            'task'
        );

        $this->dropTable('task');
    }
}
