<?php
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\ArsipInaktif */

$this->title = 'Create Arsip Inaktif';
$this->params['breadcrumbs'][] = ['label' => 'Arsip Inaktifs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="arsip-inaktif-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model, 
        'model2' => $model2,
    ]) ?>

</div>