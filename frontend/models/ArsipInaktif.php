<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;
use yii\helpers\Url;
use yii\helpers\Html;

/**
 * This is the model class for table "arsip_inaktif".
 *
 * @property integer $id
 * @property integer $no_urut
 * @property string $no_fisis
 * @property string $kd_masalah
 * @property string $kd_pengolah
 * @property string $kd_media
 * @property string $uraian
 * @property integer $kurun_waktu1
 * @property integer $kurun_waktu2
 * @property string $kd_ruang
 * @property string $kd_rak
 * @property integer $no_box
 * @property string $imageFile
 *
 * @property PolaKlasifikasi $kdMasalah
 * @property JenisMedia $kdMedia
 * @property UnitPengolah $kdPengolah
 * @property LokRakRol $kdRak
 * @property LokRuang $kdRuang
 * 
 */
class ArsipInaktif extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'arsip_inaktif';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['no_fisis', 'kd_masalah', 'kd_pengolah', 'uraian', 'kurun_waktu'], 'required'],
        
            [['no_box','no_fisis', 'kd_masalah', 'kd_pengolah', 'kd_media', 'kd_ruang', 'kd_rak'], 'string', 'max' => 10],
            [['kurun_waktu'], 'string', 'max' => 50],
            [['uraian', 'imageFile'], 'string', 'max' => 200]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'no_fisis' => 'No Fisis',
            'kd_masalah' => 'Kode Masalah',
            'kd_pengolah' => 'Unit Pengolah',
            'kd_media' => 'Media',
            'uraian' => 'Uraian',
            'kurun_waktu' => 'Tahun',
            'kd_ruang' => 'Ruang',
            'kd_rak' => 'Rak',
            'no_box' => 'Box',
            'imageFile' => 'imageFile',
            'linkArsip' => Yii::t('app', 'ArsipInaktif'),
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKdMasalah()
    {
        return $this->hasOne(PolaKlasifikasi::className(), ['kode' => 'kd_masalah']);
    }
    
    public function getMasalahList() {
        $droptions = PolaKlasifikasi::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'kode', function ($droptions) {
            return $droptions['kode'].' - '.$droptions['masalah'];
        });
    }
    
    public function getMasalah() {
        return $this->kd_masalah.'-'.$this->kdMasalah->masalah;
        
    }
    
    public function getLinkArsip() {
        $url = Url::to(['arsip-inaktif/view', 'id' => $this->id]);
        $option = [];
        return Html::a($this->uraian, $url, $option);
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKdMedia()
    {
        return $this->hasOne(JenisMedia::className(), ['kode' => 'kd_media']);
    }
    
    public function getMediaList() {
        $droptions = JenisMedia::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'kode', 'jenis_media');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKdPengolah()
    {
        return $this->hasOne(UnitPengolah::className(), ['kode' => 'kd_pengolah']);
    }
    
    public function getUnitPengolahList() {
        $droptions = UnitPengolah::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'kode', 'unit_pengolah');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKdRak()
    {
        return $this->hasOne(LokRakRol::className(), ['kode' => 'kd_rak']);
    }
    
    public function getRakList() {
        $droptions = LokRakRol::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'kode', 'nama_rak');
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getKdRuang()
    {
        return $this->hasOne(LokRuang::className(), ['kode' => 'kd_ruang']);
    }
    
    public function getRuangList() {
        $droptions = LokRuang::find()->asArray()->all();
        return ArrayHelper::map($droptions, 'kode', 'nama_ruang');
    }
    
}
