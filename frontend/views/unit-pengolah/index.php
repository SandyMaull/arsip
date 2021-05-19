<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\UnitPengolahSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Unit Pengolah';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="unit-pengolah-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Unit Pengolah', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style'=>'width:70%'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn', 'contentOptions'=>['style'=>'width:5%']],
            ['attribute'=>'kode', 'contentOptions'=>['style'=>'width:7%']],
            ['attribute'=>'unit_pengolah', 'contentOptions'=>['style'=>'width:35%']],
            ['attribute'=>'keterangan', 'contentOptions'=>['style'=>'width:25%']],
            ['class' => 'yii\grid\ActionColumn', 'contentOptions'=>['style'=>'width:7%']],
        ],
    ]); ?>

</div>
