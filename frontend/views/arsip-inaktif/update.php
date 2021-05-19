<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\ArsipInaktif */

$this->title = 'Update Arsip Inaktif: ' . ' ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Arsip Inaktifs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="arsip-inaktif-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
