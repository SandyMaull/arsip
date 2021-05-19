<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "pola_klasifikasi".
 *
 * @property integer $id
 * @property string $kode
 * @property string $masalah
 *
 * @property ArsipInaktif[] $arsipInaktifs
 */
class PolaKlasifikasi extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'pola_klasifikasi';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'masalah'], 'required'],
            [['kode'], 'string', 'max' => 10],
            [['masalah','keterangan'], 'string', 'max' => 255]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'kode' => 'Kode',
            'masalah' => 'Masalah',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArsipInaktifs()
    {
        return $this->hasMany(ArsipInaktif::className(), ['kd_masalah' => 'kode']);
    }
}
