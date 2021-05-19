<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\LokRakRol */

$this->title = $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Lokasi Rak/Rol', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lok-rak-rol-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->kode], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->kode], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'kode',
            'kd_ruang',
            'nama_rak',
        ],
    ]) ?>

</div>
