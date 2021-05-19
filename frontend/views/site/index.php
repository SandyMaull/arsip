<?php

use yii\bootstrap\Modal;
use kartik\social\FacebookPlugin;
use yii\grid\GridView;
use yii\bootstrap\Collapse;
use yii\bootstrap\Alert;
use yii\helpers\Html;

/* @var $this yii\web\View */
$this->title = 'Aplikasi e-Arsip-NTB ';
?>
<div class="site-index">

    <h1 align="center">e-Arsip-NTB  <i class="fa fa-folder-open"></i></h1>
    <p align="center" class="lead">Sistem Informasi Arsip Inaktif</p>

    <div class="arsip-inaktif-index">

    <?php 
        echo Collapse::widget([
            'items' => [
                [
                    'label' => 'Advance Search',
                    'content' => $this->render('/arsip-inaktif/_search', ['model' => $searchModel])
                ]
            ]
        ])
     ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            //['attribute' => 'no_urut', 'format' => 'raw', 'contentOptions' => ['style' => 'width:8%']],
            ['attribute' => 'no_fisis', 'format' => 'raw', 'contentOptions' => ['style' => 'width:7%']],
            ['attribute' => 'kd_masalah', 'format'=>'raw', 'contentOptions'=>['style'=>'width:7%']],
            ['attribute' => 'kd_pengolah', 'value' => 'kdPengolah.unit_pengolah'],
            // 'kd_media',
            //'uraian',
            ['attribute' => 'linkArsip', 'format' => 'raw', 'label' => 'Uraian'],
            ['attribute'=>'kurun_waktu', 'format'=>'raw', 'contentOptions'=>['style'=>'width:10%']],
            // 'kd_ruang',
            ['attribute'=>'kd_rak','value'=>'kdRak.nama_rak', 'contentOptions'=>['style'=>'width:7%']],
            ['attribute'=>'no_box', 'format'=>'raw', 'contentOptions'=>['style'=>'width:7%']],
        ],
    ]); ?>

</div>
    
</div>
