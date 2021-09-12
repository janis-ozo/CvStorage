<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%address}}`.
 */
class m210912_083743_create_address_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%address}}', [
            'id' => $this->primaryKey(),
            'country'=>$this->string(),
            'index'=>$this->string(),
            'city'=>$this->string(),
            'street_name'=>$this->string(),
            'street_number'=>$this->integer()
        ]);

        $this->addForeignKey(
            'fk-address_cv-id',
            'address',
            'id',
            'cv',
            'id',
            'CASCADE'
        );


    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%address}}');
    }
}
