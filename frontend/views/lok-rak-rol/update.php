<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\LokRakRol */

$this->title = 'Update Lokasi Rak/Rol: ' . ' ' . $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Lokasi Rak/Rol', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'id' => $model->kode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="lok-rak-rol-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
