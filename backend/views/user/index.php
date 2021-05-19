<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\Collapse;

/* @var $this yii\web\View */
/* @var $searchModel common\models\search\UserSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Users';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="user-index">

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
        <?= Html::a('Create User', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            ['attribute' => 'userIdLink', 'format' => 'raw'],
            ['attribute' => 'userLink', 'format' => 'raw'],
            ['attribute' => 'profileLink', 'format' => 'raw'],
            'email:email',
            'roleName',
            'statusName',
            'created_at',
            //'id',
            //'username',
            //'auth_key',
            //'password_hash',
            //'password_reset_token',                      
            // 'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>

</div>
