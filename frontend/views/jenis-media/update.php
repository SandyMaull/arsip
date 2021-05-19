<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\JenisMedia */

$this->title = 'Update Jenis Media: ' . ' ' . $model->kode;
$this->params['breadcrumbs'][] = ['label' => 'Jenis Media', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->kode, 'url' => ['view', 'id' => $model->kode]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="jenis-media-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
