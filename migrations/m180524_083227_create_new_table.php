<?php

use yii\db\Migration;

/**
 * Handles the creation of table `new`.
 */
class m180524_083227_create_new_table extends Migration
{
    public function safeUp()
    {
        $this->createTable('news', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull(),
            'content' => $this->text(),
        ]);

    }

    public function safeDown()
    {
        $this->dropTable('news');
    }
}
