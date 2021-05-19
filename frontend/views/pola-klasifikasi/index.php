<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\PolaKlasifikasiSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Pola Klasifikasi';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pola-klasifikasi-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Pola Klasifikasi', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style'=>'width:70%'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn','contentOptions'=>['style'=>'width:7%']],

            [
                'attribute'=>'kode',
                'format'=>'raw',
                'contentOptions'=>['style'=>'width:10%']
            ],
            ['attribute'=>'masalah', 'format'=>'raw','contentOptions'=>['style'=>'width:35%']],
            ['attribute'=>'keterangan', 'format'=>'raw','contentOptions'=>['style'=>'width:35%']],

            ['class' => 'yii\grid\ActionColumn','contentOptions' => ['style'=>'width:9%']],
        ],
    ]); ?>

</div>
