<?php

/* @var $this yii\web\View */
/* @var $home yii\web\View */

$this->title = 'My Yii Application';

use yii\helpers\Url; ?>
<div class="site-index">

    <div class="jumbotron">
        <h1><?= Yii::t('app','Home')?></h1>

        <p class="lead"><?= Yii::t('app','From this page you can follow to main page and find dish by ingredients') ?></p>

        <p><a class="btn btn-lg btn-success" href="<?= $home ?>"><?= Yii::t('app','Go')?></a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-6">
                <h2><?=Yii::t('app','Ingredients')?></h2>

                <p><?= Yii::t('app','In this page you can create ingredient, and set visibility current ingredient')?></p>

                <p><a class="btn btn-default" href="<?= Url::to(['ingredient/index'])?>"><?= Yii::t('app','Go')?>&raquo;</a></p>
            </div>
            <div class="col-lg-6">
                <h2><?=Yii::t('app','Dishes')?></h2>

                <p><?= Yii::t('app','In this page you can create dish, and set visibility current dish')?></p>

                <p><a class="btn btn-default" href="<?= Url::to(['dish/index'])?>"><?= Yii::t('app','Go')?></a></p>
            </div>
        </div>

    </div>
</div>
