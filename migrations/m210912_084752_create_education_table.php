<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%education}}`.
 */
class m210912_084752_create_education_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%education}}', [
            'id' => $this->primaryKey(),
            'cv_id'=>$this->integer()->notNull(),
            'educational_institution'=>$this->string(),
            'faculty'=>$this->string(),
            'field_of_study'=>$this->string(),
            'education_level'=>$this->string(),
            'status'=>$this->string(),

        ]);

        $this->addForeignKey(
            'fk-education_cv-id',
            'education',
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
        $this->dropTable('{{%education}}');
    }
}
