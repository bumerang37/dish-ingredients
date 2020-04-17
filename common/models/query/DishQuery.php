<?php


namespace common\models\query;


use yii\db\ActiveQuery;

class DishQuery extends ActiveQuery
{

    /**
     * @inheritdoc
     * @return \common\models\Dish[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \common\models\Dish|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    public function active()
    {
        return $this->andWhere('[[active]]=1');
    }
}