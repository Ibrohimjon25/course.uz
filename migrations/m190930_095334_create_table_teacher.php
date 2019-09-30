<?php

use yii\db\Migration;

/**
 * Class m190930_095334_create_table_teacher
 */
class m190930_095334_create_table_teacher extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        return $this->createTable('teacher', [
            'id'=>$this->primaryKey(),
            'name'=>'string',
            'profession_uz'=>'string',
            'profession_ru'=>'string',
            'profession_en'=>'string',
            'img'=>'string',
            'points'=>'int'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        return $this->dropTable('teacher');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190930_095334_create_table_teacher cannot be reverted.\n";

        return false;
    }
    */
}
