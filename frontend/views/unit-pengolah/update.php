<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\UnitPengolah */

$this->title = 'Update Unit Pengolah: ' . ' ' . $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Unit Pengolah', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'id' => $model->kode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="unit-pengolah-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
