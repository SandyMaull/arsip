<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Collapse;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\ProfileSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Profiles';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="profile-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php
        echo Collapse::widget([
            'items' => [
                [
                    'label' => 'Search',
                    'content' => $this->render('_search', ['model' => $searchModel])
                ]
            ]
        ]);
    ?>
    <p>
        <?= Html::a('Create Profile', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            //'id',
            ['attribute' => 'profileIdLink', 'format' => 'raw'],
            ['attribute' => 'userLink', 'format' => 'raw'],
            //'user_id',
            'first_name',
            'last_name',
            'birthdate',
            'genderName',
            // 'created_at',
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
