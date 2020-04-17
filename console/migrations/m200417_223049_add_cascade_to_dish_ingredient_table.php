<?php

use yii\db\Migration;

/**
 * Class m200417_223049_add_cascade_to_dish_ingredient_table
 */
class m200417_223049_add_cascade_to_dish_ingredient_table extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->dropForeignKey('fk_to_dish','{{%dish_ingredient}}');
        $this->dropForeignKey('fk_to_ingredient','{{%dish_ingredient}}');

        $this->addForeignKey('fk_to_dish', '{{%dish_ingredient}}', 'dish_id', 'dish', 'id','CASCADE');
        $this->addForeignKey('fk_to_ingredient', '{{%dish_ingredient}}', 'ingredient_id', 'ingredient', 'id','CASCADE');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk_to_dish','{{%dish_ingredient}}');
        $this->dropForeignKey('fk_to_ingredient','{{%dish_ingredient}}');

        $this->addForeignKey('fk_to_dish', '{{%dish_ingredient}}', 'dish_id', 'dish', 'id');
        $this->addForeignKey('fk_to_ingredient', '{{%dish_ingredient}}', 'ingredient_id', 'ingredient', 'id');
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m200417_223049_add_cascade_to_dish_ingredient_table cannot be reverted.\n";

        return false;
    }
    */
}
