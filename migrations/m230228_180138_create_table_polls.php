<?php

use yii\db\Migration;

/**
 * Class m230228_180138_create_table_polls
 */
class m230228_180138_create_table_polls extends Migration {

    /**
     * {@inheritdoc}
     */
    public function safeUp() {
        
        $this->createTable('questions', [
            'id' => $this->primaryKey(),
            'tsCreate' => $this->integer(),
            'question' => $this->text()->notNull(),
        ]);
        
        $this->createTable('polls', [
            'id' => $this->primaryKey(),
            'tsCreate' => $this->integer(),
            'date' => $this->date(),
            'phone' => $this->string()->notNull(),
            'email' => $this->string()->notNull(),
            'area' => $this->string()->notNull(),
            'city' => $this->string()->notNull(),
            'gender' => $this->integer()->notNull(),
            'rating' => $this->integer()->notNull(),
            'questionId' => $this->integer()->notNull(),
            'comment' => $this->text()->notNull(),
        ]);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown() {
        $this->dropTable('polls');
        $this->dropTable('questions');
        
    }

}
