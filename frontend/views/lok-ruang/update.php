<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\LokRuang */

$this->title = 'Update Lokasi Ruang: ' . ' ' . $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Lokasi Ruang', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'id' => $model->kode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lok-ruang-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
