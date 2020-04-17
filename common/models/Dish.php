<?php

namespace common\models;


use common\models\query\DishQuery;
use Yii;

/**
 * This is the model class for table "dishes".
 *
 * @property int $id
 * @property string $title Название блюда
 * @property int|null $active Показывать
 *
 * @property DishIngredient[] $dishesIngredients
 * @property Ingredient $ingredients
 */
class Dish extends \yii\db\ActiveRecord
{

    /**
     * @var array $_ingredientsArr
     */
    private $_ingredientsArr;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return '{{%dish}}';
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
            [['title'], 'unique', 'message' => Yii::t('app','Dish with same name already exists')],
            ['ingredientsArr','safe']
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
            'ingredients' => Yii::t('app', 'Ingredients')
        ];
    }

    /**
     * Gets query for [[DishIngredient]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getDishIngredient()
    {
        return $this->hasMany(DishIngredient::className(), ['dish_id' => 'id']);
    }

    public function getIngredients()
    {
        return $this->hasMany(Ingredient::className(), ['id' => 'ingredient_id'])->viaTable('dish_ingredient', ['dish_id' => 'id']);
    }

    /**
     * @return mixed
     */
    public function getIngredientsArr()
    {
        if ($this->_ingredientsArr === null) {
            $this->_ingredientsArr = $this->getIngredients()->select('id')->column();
        }
        return $this->_ingredientsArr;
    }

    /**
     * @param mixed $ingredients
     */
    public function setIngredientsArr($ingredients)
    {
        $this->_ingredientsArr = (array) $ingredients;
    }

    public function afterSave($insert, $changedAttributes)
    {
        parent::afterSave($insert, $changedAttributes);
        $this->updateIngredients();
    }

    private function updateIngredients()
    {
        /** @var mixed $ingredients Old Ingredients ids */
        $oldIngredients = $this->getIngredients()->select('id')->column();

        /** @var mixed $ingredients Current Ingredients ids */
        $ingredients = $this->getIngredientsArr();

//        if (!empty($oldIngredients) && !empty($ingredients)) {
            foreach (array_filter(array_diff($ingredients, $oldIngredients)) as $IngredientId) {
                /** @var Ingredient $Ingredient */
                if ($Ingredient = Ingredient::findOne($IngredientId)) {
                    $this->link('ingredients', $Ingredient);
                }
            }

            foreach (array_filter(array_diff($oldIngredients, $ingredients)) as $IngredientId) {
                /** @var Ingredient $Category */
                if ($Ingredient = Ingredient::findOne($IngredientId)) {
                    $this->unlink('ingredients', $Ingredient, true);
                }
            }
//        }
    }

    /**
     * @inheritdoc
     * @return DishQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DishQuery(get_called_class());
    }
}
