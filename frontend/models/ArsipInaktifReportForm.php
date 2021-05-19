<?php

namespace frontend\models;
use yii\base\Model;
use Yii;
use frontend\models\ArsipInaktif;

/**
 * Description of LaporArsip
 *
 * @author yasrul
 */
class ArsipInaktifReportForm extends Model 
{
    public $tahun1;
    public $tahun2;
    public $masalah;
    public $pengolah;
    
    public function rules() 
    {
        return [
            ['tahun1','required'],
            [['tahun1','tahun2'], 'integer'],
            [['masalah','pengolah'],'string']
        ];
    }
    
    public function reportAll() {
        $dataProvider = ArsipInaktif::find()->andFilterWhere([
            'kurun_waktu1' => $this->tahun1,
            'kurun_waktu2' => $this->tahun2,
            'kd_masalah' => $this->masalah,
            'kd_pengolah' => $this->pengolah,
        ]);
        
        return $dataProvider;
                
    }
}
