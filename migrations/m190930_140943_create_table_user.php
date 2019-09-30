<?php

use yii\db\Migration;

/**
 * Class m190930_140943_create_table_user
 */
class m190930_140943_create_table_user extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        return $this->createTable('user', [
            'id'=>$this->primaryKey(),
            'username'=>'string',
            'auth_key'=>'string',
            'password'=>'string',
            'status'=>'string'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        return $this->dropTable('user');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190930_140943_create_table_user cannot be reverted.\n";

        return false;
    }
    */
}
