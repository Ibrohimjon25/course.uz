<?php

use yii\db\Migration;

/**
 * Class m191003_212335_create_table_bookk
 */
class m191003_212335_create_table_bookk extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        return $this->createtable('bookk', [
            'id'=>$this->primaryKey(),
            'name_uz'=>'string',
            'name_ru'=>'string',
            'name_en'=>'string',
            'description_uz'=>'string',
            'description_ru'=>'string',
            'description_en'=>'string',
            'img'=>'string'
            
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        return $this->dropTable('bookk');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m191003_212335_create_table_bookk cannot be reverted.\n";

        return false;
    }
    */
}
