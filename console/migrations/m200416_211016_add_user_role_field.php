<?php

use yii\db\Migration;

/**
 * Class m200416_211016_add_user_role_field
 */
class m200416_211016_add_user_role_field extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%user}}', 'role', $this->smallInteger()->after('email')->defaultValue(1));
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropColumn('{{%user}}', 'role');
    }

}
