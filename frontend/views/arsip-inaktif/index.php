<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\ArsipInaktifSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Arsip Inaktif';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-inaktif-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
    <?= Html::a('Create Arsip Inaktif', ['create'], ['class' => 'btn btn-success']) ?> 
    </p>
    

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            /*[
                'attribute' => 'no_urut',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:7%']
            ],*/
            [
                'attribute' => 'no_fisis',
                'format' => 'raw',
                'contentOptions' => ['style' => 'width:7%']
            ],
            [
                'attribute' => 'kd_masalah',
                'format'=>'raw',
                'contentOptions'=>['style'=>'width:10%']
            ],
            [
                'attribute' => 'kd_pengolah',
                'value' => 'kdPengolah.unit_pengolah',
            ],
            // 'kd_media',
            'uraian',
            [
                'attribute'=>'kurun_waktu',
                'format'=>'raw',
                'contentOptions'=>['style'=>'width:10%']
            ],
            // 'kd_ruang',
            [
                'attribute'=>'kd_rak',
                'value' => 'kdRak.nama_rak',
                'format'=>'raw',
                'contentOptions'=>['style'=>'width:8%']
            ],
            [
                'attribute'=>'no_box',
                'format'=>'raw',
                'contentOptions'=>['style'=>'width:8%']
            ],
            

            ['class' => 'yii\grid\ActionColumn', 'contentOptions'=>['style'=>'width:6%']],
        ],
    ]); ?>

</div>
