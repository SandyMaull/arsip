<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\LokRuang */

$this->title = $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Lokasi Ruang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lok-ruang-view">

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
            'nama_ruang',
            'keterangan',
        ],
    ]) ?>

</div>
