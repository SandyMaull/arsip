<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\LokRuang */

$this->title = 'Create Lokasi Ruang';
$this->params['breadcrumbs'][] = ['label' => 'Lokasi Ruang', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lok-ruang-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
