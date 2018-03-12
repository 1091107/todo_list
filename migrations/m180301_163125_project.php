<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180301_163125_project
 */
class m180301_163125_project extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('project', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'id_user' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

        $this->addForeignKey(
            'fk-project-id_user',
            'project',
            'id_user',
            'user',
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
            'fk-project-id_user',
            'project'
        );

        $this->dropTable('project');
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('project', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'id_user' => Schema::TYPE_INTEGER . ' NOT NULL',
        ]);

        $this->addForeignKey(
            'fk-project-id_user',
            'project',
            'id_user',
            'user',
            'id',
            'CASCADE'
        );
    }

    public function down()
    {
        $this->dropForeignKey(
            'fk-project-id_user',
            'project'
        );

        $this->dropTable('project');
    }
}
