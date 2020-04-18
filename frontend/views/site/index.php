<?php

/* @var $this yii\web\View */
/* @var $ingredients \common\models\Ingredient[] */
/* @var $searchModel common\models\search\DishSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
/* @var $this yii\web\View */

$this->title = Yii::t('app', 'Find dish by ingredient');

use kartik\select2\Select2;
use yii\helpers\Html; ?>
<div class="site-index">
    <div class="content">
        <div class="pricing-header px-3 py-3 pt-md-5 pb-md-4 mx-auto text-center">
            <h1 class="display-4"><?= Html::encode($this->title) ?></h1>
            <p class="lead">Поиск в блюдах по ингридиентам осуществляется по следующим правилам:</p>
        </div>
       <?= $this->render('@app/views/site/_header.php') ?>
        <?= Select2::widget([
            'name' => 'selected',
            'language' => 'ru',
            'id' => 'ingredient-select',
            'data' => $ingredients,
            'showToggleAll' => false,
            'options' => ['placeholder' => Yii::t('app', 'Choose ingredient ...'), 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true,
                'maximumSelectionLength' => 5,
            ],
        ]); ?>
        <div id="search-result">

        </div>
    </div>
</div>
