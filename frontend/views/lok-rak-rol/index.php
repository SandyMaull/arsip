<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\search\LokRakRolSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Lokasi Rak/Rol';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lok-rak-rol-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Lokasi Rak/Rol', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'options' => ['style'=>'width:75%'],
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            ['attribute'=>'kode', 'format'=>'raw','contentOptions'=>['style'=>'width:10%']],
            'kd_ruang',
            'nama_rak',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
