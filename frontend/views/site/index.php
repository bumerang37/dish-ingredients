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
        <div class="container rules-container">
            <div class="card-deck mb-3 text-center">
                <div class="card mb-6 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">1</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Если найдены блюда с полным совпадением ингредиентов выводятся только
                                они.
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-6 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">2</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Если найдены блюда с частичным совпадением ингредиентов выводим
                                в порядке уменьшения совпадения ингредиентов вплоть до 2х
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="card-deck mb-3 text-center">
                <div class="card mb-6 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">3</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Если найдены блюда с совпадением менее чем 2 ингредиента или не
                                найдены вовсе, выводится
                                “Ничего не найдено”
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="card mb-6 shadow-sm">
                    <div class="card-header">
                        <h4 class="my-0 font-weight-normal">4</h4>
                    </div>
                    <div class="card-body">
                        <ul class="list-unstyled mt-3 mb-4">
                            <li>Если выбрано менее 2х
                                ингредиентов не ищем, нужно больше ингредиентов
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>

        <?=
        Select2::widget([
            'name' => 'selected',
            'language' => 'ru',
            'id' => 'ingredient-select',
            'data' => $ingredients,
            'showToggleAll' => false,
            'options' => ['placeholder' => 'Выберите ингредиент ...', 'multiple' => true],
            'pluginOptions' => [
                'allowClear' => true,
                'maximumSelectionLength' => 5,
            ],
        ]); ?>
        <div id="search-result">

        </div>
    </div>
</div>
