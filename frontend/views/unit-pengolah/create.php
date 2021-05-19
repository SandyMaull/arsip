<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\UnitPengolah */

$this->title = 'Create Unit Pengolah';
$this->params['breadcrumbs'][] = ['label' => 'Unit Pengolahs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-pengolah-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
