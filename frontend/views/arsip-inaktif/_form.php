<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\ArsipInaktif */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="arsip-inaktif-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]); ?>

    <?= $form->field($model, 'no_fisis')->textInput(['maxlength' => true, 'style' => 'width:200px']) ?>

    <?= $form->field($model, 'kd_masalah')->dropDownList($model->masalahList, [
        'prompt' => '[ Pilih Masalah ]',
        'style' => 'width:500px'
        ]) ?>

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
    <?= $form->field($model, 'uraian')->textarea(['rows' => 3, 'style'=>'width:700px']) ?>

    <?= $form->field($model, 'kurun_waktu')->textInput(['style' => 'width:100px']) ?>

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

    <?= $form->field($model, 'no_box')->textInput(['style'=>'width:200px']) ?>

    <?= $form->field($model2, 'imageFile')->fileInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Create' : 'Update', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
