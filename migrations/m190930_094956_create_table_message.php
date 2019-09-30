<?php

use yii\db\Migration;

/**
 * Class m190930_094956_create_table_message
 */
class m190930_094956_create_table_message extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        return $this->createTable('message', [
            'id'=>$this->primaryKey(),
            'name_uz'=>'string',
            'name_en'=>'string',
            'name_ru'=>'string',
            'email'=>'string',
            'description_uz'=>'string',
            'description_en'=>'string',
            'description_ru'=>'string',
            'img'=>'string'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        return $this->dropTable('message');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190930_094956_create_table_message cannot be reverted.\n";

        return false;
    }
    */
}
