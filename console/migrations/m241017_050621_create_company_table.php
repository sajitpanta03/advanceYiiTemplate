<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%company}}`.
 */
class m241017_050621_create_company_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%company}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'address' => $this->string(255),
            'user_id' => $this->integer()->notNull(),
            'created_at' => $this->date()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex('idx-company-user_id', 'company', 'user_id');
        $this->addForeignKey('fk-company-user_id', 'company', 'user_id', 'user', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%company}}');
        $this->dropForeignKey('fk-company-user_id', '{{%company}}');
    }
}
