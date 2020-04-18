<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Dish;

/**
 * DishesSearch represents the model behind the search form of `common\models\Dishes`.
 */
class DishSearch extends Dish
{
    public $ingredients;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'active'], 'integer'],
            [['title','ingredients'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = Dish::find()->with('ingredients')->groupBy('title')->joinWith('ingredients');

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $dataProvider->setSort([
            'attributes' => [
                'id',
                'title',
                'active',
                'ingredients' => [
                    'asc' => ['dish_ingredient.dish_id' => SORT_ASC],
                    'desc' => ['dish_ingredient.dish_id' => SORT_DESC],
                    'default' => SORT_ASC
                ],
            ]]);

        // grid filtering conditions
        $query->andFilterWhere([
            self::tableName() . '.id' => $this->id,
            self::tableName() . '.active' => $this->active,
            'dish_ingredient.ingredient_id' => $this->ingredients,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title]);

        return $dataProvider;
    }
}
