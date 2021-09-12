<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%cv}}`.
 */
class m210912_081839_create_cv_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%cv}}', [
            'id' => $this->primaryKey(),
            'name'=>$this->string()->notNull(),
            'surname'=>$this->string()->notNull(),
            'phone'=>$this->integer(),
            'email'=>$this->string(),
            'created_at'=>$this->timestamp(),
        ]);

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%cv}}');
    }
}
