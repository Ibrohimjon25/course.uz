<?php

use yii\db\Migration;

/**
 * Class m190930_100050_create_table_book
 */
class m190930_100050_create_table_book extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('book', [
            'id'=>$this->primaryKey(),
            'name_uz'=>'string',
            'name_ru'=>'string',
            'name_en'=>'string',
            'description_uz'=>'string',
            'description_ru'=>'string',
            'description_en'=>'string',
            'avtor_uz'=>'string',
            'avtor_en'=>'string',
            'avtor_ru'=>'string',
            'img'=>'string',
            'category_id'=>'int'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        return $this->dropTable('book');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190930_100050_create_table_book cannot be reverted.\n";

        return false;
    }
    */
}
