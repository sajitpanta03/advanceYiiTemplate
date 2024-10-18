<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%department}}`.
 */
class m241017_052924_create_department_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%department}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(255),
            'user_id' => $this->integer()->notNull(),
            'company_id' => $this->integer(),
            'created_at' => $this->date()->defaultExpression('CURRENT_TIMESTAMP'),
        ]);

        $this->createIndex('idx-department-user_id', 'department', 'user_id');
        $this->addForeignKey('fk-department-user_id', 'department', 'user_id', 'user', 'id', 'CASCADE');

        $this->createIndex('idx-department-company_id', 'department', 'company_id');
        $this->addForeignKey('fk-department-company_id', 'department', 'company_id', 'company', 'id', 'CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%department}}');
        $this->dropForeignKey('fk-department-user_id', '{{%department}}');
        $this->dropForeignKey('fk-department-company_id', '{{%department}}');
    }
}
