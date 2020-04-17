<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%ingredient}}`.
 */
class m200417_125424_create_ingredient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%ingredient}}', [
            'id' => $this->primaryKey(),
            'title' => $this->string()->notNull()->unique()->comment('Название ингредиента'),
            'active' => $this->integer()->defaultValue('1')->comment('Активный')
        ], $tableOptions);
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropTable('{{%ingredient}}');
    }
}
