<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%workplace}}`.
 */
class m210912_140107_create_workplace_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%workplace}}', [
            'id' => $this->primaryKey(),
            'cv_id'=>$this->integer()->notNull(),
            'workplace_name'=>$this->string(),
            'position'=>$this->string(),
            'types_of_work_schedules'=>$this->string(),
            'work_experience'=>$this->string(),
            'created_at'=>$this->dateTime()

        ]);

        $this->addForeignKey(
            'fk-workplace_cv-id',
            'workplace',
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
        $this->dropTable('{{%workplace}}');
    }
}
