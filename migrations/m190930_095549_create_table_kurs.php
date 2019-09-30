<?php

use yii\db\Migration;

/**
 * Class m190930_095549_create_table_kurs
 */
class m190930_095549_create_table_kurs extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        $this->createTable('kurs', [
            'id'=>$this->primaryKey(),
            'name_uz'=>'string',
            'name_en'=>'string',
            'name_ru'=>'string',
            'description_uz'=>'string',
            'description_en'=>'string',
            'description_ru'=>'string',
            'date'=>'string',
            'teacher_uz'=>'string',
            'teacher_ru'=>'string',
            'teacher_en'=>'string',
            'points'=>'int',
            'img'=>'string',
            'category_id'=>'int'
        ]);
        $this->addForeignKey('po-category', 'kurs', 'category_id', 'category_course','id', 'CASCADE', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        return $this->dropTable('kurs');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190930_095549_create_table_kurs cannot be reverted.\n";

        return false;
    }
    */
}
