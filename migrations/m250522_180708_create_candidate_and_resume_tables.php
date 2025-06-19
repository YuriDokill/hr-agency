<?php

use yii\db\Migration;

class m250522_180708_create_candidate_and_resume_tables extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('candidate', [
            'id' => $this->primaryKey(),
            'name' => $this->string(100)->notNull(),
            'email' => $this->string(100)->notNull()->unique(),
            'phone' => $this->string(20),
            'created_at' => $this->timestamp()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createTable('resume', [
            'id' => $this->primaryKey(),
            'candidate_id' => $this->integer()->notNull(),
            'skills' => $this->text()->notNull(),
            'experience' => $this->integer()->defaultValue(0),
            'expected_salary' => $this->integer(),
            'file' => $this->string(255),
        ]);

        $this->addForeignKey(
            'fk-resume-candidate_id',
            'resume',
            'candidate_id',
            'candidate',
            'id',
            'CASCADE'
        );
}

    public function safeDown()
    {
        $this->dropForeignKey('fk-resume-candidate_id', 'resume');
        $this->dropTable('resume');
        $this->dropTable('candidate');
}
}
    /**
     * {@inheritdoc}
     */

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m250522_180708_create_candidate_and_resume_tables cannot be reverted.\n";

        return false;
    }
    */

