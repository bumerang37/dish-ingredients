<?php

namespace common\models;

use common\models\query\IngredientQuery;
use Yii;

/**
 * This is the model class for table "ingredient".
 *
 * @property int $id
 * @property string $title Название ингредиента
 * @property int|null $active Активный
 *
 * @property DishIngredient[] $dishesIngredients
 */
class Ingredient extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%ingredient}}';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title'], 'required'],
            [['active'], 'integer'],
            [['title'], 'string', 'max' => 255],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'title' => Yii::t('app', 'Title'),
            'active' => Yii::t('app', 'Active'),
        ];
    }

    /**
     * Gets query for [[DishesIngredients]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDishesIngredients()
    {
        return $this->hasMany(DishIngredient::className(), ['ingredient_id' => 'id']);
    }

    public function getDish()
    {
        return $this->hasMany(Dish::className(), ['id' => 'dish_id'])->viaTable('dish_ingredient', ['ingredient_id' => 'id']);
    }

    public static function find()
    {
        return new IngredientQuery(get_called_class());
    }
}
