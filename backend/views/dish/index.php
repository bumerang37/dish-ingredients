<?php

use common\models\Ingredient;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\DishSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = Yii::t('app', 'Dishes');
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dishes-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a(Yii::t('app', 'Create Dish'), ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'title',
            [
                'attribute' => 'ingredients',
                'value' => function ($model) {
                    /* @var $model Dishes */
                    return implode(', ', ArrayHelper::map($model->ingredients, 'id', 'title'));
                },
                'filter' => Ingredient::find()->select(['title', 'id'])->indexBy('id')->column(),
            ],
            'active:boolean',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>


</div>
