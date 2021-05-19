<?php

namespace frontend\controllers;
use frontend\models\ArsipInaktif;
use kartik\mpdf\Pdf;

class LaporanController extends \yii\web\Controller
{
    public function actionIndex()
    {
        return $this->render('index');
    }

}
