<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>
<div class="raw">
    <div class="col-lg-4">
        <?= $form->field($model, 'tahun') ?>
    </div>
    <div class="col-lg-8">
        <?= $form->field($model, 'masalah') ?>
        <?= $form->field($model,'pengolah') ?>
    </div>
</div>
<div class="raw">
    <div class="col-lg-4">
        <div class="form-group">
            <?= Html::submitButton('Submit', ['class' => 'btn btn-primary']) ?>
        </div>
    </div>
    
</div>

<?php ActiveForm::end(); ?>



