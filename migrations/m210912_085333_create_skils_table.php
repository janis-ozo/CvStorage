<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%skils}}`.
 */
class m210912_085333_create_skils_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%skils}}', [
            'id' => $this->primaryKey(),
            'cv_id'=>$this->integer()->notNull(),
            'description'=> $this->text(),
            'type'=>$this->string()->notNull(),
        ]);

        $this->addForeignKey(
            'fk-skils_cv-id',
            'skils',
            'cv_id',
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
        $this->dropTable('{{%skils}}');
    }
}
