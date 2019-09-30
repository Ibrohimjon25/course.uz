<?php

use yii\db\Migration;

/**
 * Class m190930_094524_create_table_pictures
 */
class m190930_094524_create_table_pictures extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function Up()
    {
        return $this->createTable('pictures', [
            'id'=>$this->primaryKey(),
            'name_uz'=>'string',
            'name_en'=>'string',
            'name_ru'=>'string',
            'date'=>'string',
            'img'=>'string'
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function Down()
    {
        return $this->dropTable('pictures');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m190930_094524_create_table_pictures cannot be reverted.\n";

        return false;
    }
    */
}
