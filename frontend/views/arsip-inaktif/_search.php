<?php

use yii\helpers\Html;
//use yii\widgets\ActiveForm;
use yii\bootstrap\ActiveForm

/* @var $this yii\web\View */
/* @var $model frontend\models\search\ArsipInaktifSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arsip-inaktif-search">

    <?php $form = ActiveForm::begin([
        'action' => ['/arsip-inaktif/cari'],
        'method' => 'get',
        'layout' => 'horizontal'
    ]); ?>

    <?= $form->field($model, 'id')->textInput(['style' => 'width:100px']) ?>

    <?= $form->field($model, 'no_fisis')->textInput(['style' => 'width:100px']) ?>

    <?= $form->field($model, 'kd_masalah')->textInput(['style' => 'width:300px']) ?>

    <?= $form->field($model, 'kd_pengolah')->dropDownList($model->unitPengolahList, [
        'prompt' => '[ Pilih Unit Pengolah ]',
        'style' => 'width:500px',
        ]) ?>
    <!--
    <?= $form->field($model, 'kd_media')->dropDownList($model->mediaList, [
        'prompt' => '[ Pilih Media ]',
        'style' => 'width:300px'
        ]) ?>
    -->
    <?php echo $form->field($model, 'uraian') ?>

    <?php echo $form->field($model, 'kurun_waktu')->textInput(['style' => 'width:100px']) ?>

    <?= $form->field($model, 'kd_ruang')->dropDownList($model->ruangList, [
        'prompt' => '[ Pilih Ruang ]',
        'style' => 'width:500px',
        'onchange' => '
            $.post("'.Yii::$app->urlManager->createUrl('lok-rak-rol/list?id=').'"+$(this).val(), function(data) {
            $("select#lok-rak").html(data);
            });
            '
        ]) ?>

    <?= $form->field($model, 'kd_rak')->dropDownList($model->rakList, [
        'prompt' => '[ Pilih Rak ]',
        'style' => 'width:500px',
        'id' => 'lok-rak'
        ]) ?>

    <?php echo $form->field($model, 'no_box')->textInput(['style' => 'width:300px']) ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
