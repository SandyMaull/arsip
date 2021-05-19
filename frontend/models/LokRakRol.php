<?php

namespace frontend\models;

use Yii;
use yii\helpers\ArrayHelper;

/**
 * This is the model class for table "lok_rak_rol".
 *
 * @property string $kode
 * @property string $kd_ruang
 * @property string $nama_rak
 *
 * @property ArsipInaktif[] $arsipInaktifs
 * @property LokRuang $kdRuang
 */
class LokRakRol extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'lok_rak_rol';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'kd_ruang', 'nama_rak'], 'required'],
            [['kode', 'kd_ruang'], 'string', 'max' => 10],
            [['nama_rak'], 'string', 'max' => 50]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'kd_ruang' => 'Ruang',
            'nama_rak' => 'Nama Rak',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArsipInaktifs()
    {
        return $this->hasMany(ArsipInaktif::className(), ['kd_rak' => 'kode']);
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
