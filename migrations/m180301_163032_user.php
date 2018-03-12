<?php

use yii\db\Schema;
use yii\db\Migration;

/**
 * Class m180301_163032_user
 */
class m180301_163032_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('user', [
            'id' => Schema::TYPE_PK,
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('user');
    }


    // Use up()/down() to run migration code without a transaction.
    public function up()
    {
        $this->createTable('user', [
            'id' => Schema::TYPE_PK . ' NOT NULL AUTO_INCREMENT',
            'name' => Schema::TYPE_STRING . ' NOT NULL',
            'username' => Schema::TYPE_STRING . ' NOT NULL',
            'password' => Schema::TYPE_STRING . ' NOT NULL',
        ]);
    }

    public function down()
    {
        $this->dropTable('user');
    }
}
