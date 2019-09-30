<?php

use yii\db\Migration;

/**
 * Class m190930_093009_create_table_category_course
 */
class m190930_093009_create_table_category_course extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        return $this->createTable('category_course', [
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
        return $this->dropTable('category_course');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190930_093009_create_table_category_course cannot be reverted.\n";

        return false;
    }
    */
}
