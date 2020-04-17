<?php

use yii\db\Migration;

/**
 * Handles the creation of table `{{%dishes_ingredients}}`.
 */
class m200417_130304_create_dish_ingredient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        $this->createTable('{{%dish_ingredient}}', [
            'id' => $this->primaryKey(),
            'dish_id' => $this->integer(),
            'ingredient_id' => $this->integer()
        ],$tableOptions);

        $this->addForeignKey('fk_to_dish', '{{%dish_ingredient}}', 'dish_id', 'dish', 'id');
        $this->addForeignKey('fk_to_ingredient', '{{%dish_ingredient}}', 'ingredient_id', 'ingredient', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_to_dish','{{%dish_ingredient}}');
        $this->dropForeignKey('fk_to_ingredient','{{%dish_ingredient}}');
        $this->dropTable('{{%dish_ingredient}}');
    }
}
