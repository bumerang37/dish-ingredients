<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model common\models\Dish */
/* @var $form yii\widgets\ActiveForm */
/* @var $data common\models\Ingredient[] */
?>

<div class="dishes-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropDownList([ '1' => Yii::t('app', 'Yes'),'0' => Yii::t('app', 'No')]) ?>

    <?= $form->field($model, 'ingredientsArr')->widget(\kartik\select2\Select2::classname(), [
        'name' => 'ingredients',
        'language' => 'ru',
        'value' => $model->ingredients, // initial value (will be ordered accordingly and pushed to the top)
        'data' => $data,
        'maintainOrder' => true,
        'showToggleAll' => false,
        'toggleAllSettings' => [
            'unselectLabel' => '<i class="glyphicon glyphicon-remove-sign"></i> Убрать все',
            'unselectOptions' => ['class' => 'text-danger'],
        ],
        'options' => ['placeholder' => Yii::t('app', 'Choose ingredients'), 'multiple' => true],
        'pluginOptions' => [
            'tags' => false,
            'maximumSelectionLength' => 5,
        ],
    ])->label(Yii::t('app', 'Ingredients')); ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
