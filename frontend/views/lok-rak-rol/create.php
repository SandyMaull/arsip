<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\LokRakRol */

$this->title = 'Create Lokasi Rak/Rol';
$this->params['breadcrumbs'][] = ['label' => 'Lokasi Rak/Rol', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="lok-rak-rol-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
