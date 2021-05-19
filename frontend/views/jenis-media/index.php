<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\JenisMedia */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Jenis Media';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="jenis-media-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Jenis Media', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style' => 'width:50%'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'kode','contentOptions'=>['style'=>'width:10%']] ,
            'jenis_media',
            'keterangan',

            ['class' => 'yii\grid\ActionColumn','contentOptions'=>['style'=>'width:70px']],
        ],
    ]); ?>

</div>
