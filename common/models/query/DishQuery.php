<?php


namespace common\models\query;


use yii\db\ActiveQuery;

class DishQuery extends ActiveQuery
{
    public function active()
    {
        return $this->andWhere(['active' => 1]);
    }
    
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


}