<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\PolaKlasifikasi */

$this->title = 'Create Pola Klasifikasi';
$this->params['breadcrumbs'][] = ['label' => 'Pola Klasifikasi', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="pola-klasifikasi-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
