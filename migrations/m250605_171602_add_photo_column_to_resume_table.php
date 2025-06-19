<?php

use yii\db\Migration;

class m250605_XXXXXX_add_photo_column_to_resume_table extends Migration
{
    public function safeUp()
    {
        $this->addColumn('resume', 'photo', $this->string(255)->notNull()->defaultValue('default.jpg'));
        
        $this->update('resume', ['photo' => 'default.jpg']);
    }
    public function safeDown()
    {
        $this->dropColumn('resume', 'photo');
    }
}
?>