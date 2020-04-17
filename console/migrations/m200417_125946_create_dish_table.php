<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dishes}}`.
 */
class m200417_125946_create_dish_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%dish}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique()->comment('Название блюда'),
            'active' => $this->integer()->defaultValue('1')->comment('Показывать'),
        ],$tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%dish}}');
    }
}
