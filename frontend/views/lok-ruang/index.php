<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\LokRuangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lokasi Ruang';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lok-ruang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lokasi Ruang', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style'=>'width:75%'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'kode','contentOptions'=>['style'=>'width:10%']],
            'nama_ruang',
            'keterangan',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
