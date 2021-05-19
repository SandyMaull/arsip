<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\ArsipInaktif */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Arsip Inaktifs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-inaktif-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            //'no_urut',
            'no_fisis',
            //'kd_masalah',
            [
                'attribute'=>'kd_masalah',
                'value'=>$model->masalah,
            ],
            'kdPengolah.unit_pengolah',
            //'kdMedia.jenis_media',
            'uraian',
            'kurun_waktu',
            'kdRuang.nama_ruang',
            'kdRak.nama_rak',
            'no_box',
            'imageFile',
            /*
            //'imageFile',
            [
                'attribute'=>'imageFile',
                'value'=>$model->imageFile,
                'format' => ['image',['width'=>'100','height'=>'100']],
            ],*/
        ],
    ]) ?>

</div>
