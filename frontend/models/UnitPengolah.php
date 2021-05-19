<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "unit_pengolah".
 *
 * @property integer $kode
 * @property string $unit_pengolah
 * @property string $keterangan
 *
 * @property ArsipInaktif[] $arsipInaktifs
 */
class UnitPengolah extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'unit_pengolah';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'unit_pengolah'], 'required'],
            [['kode'], 'string', 'max'=>10],
            [['unit_pengolah'], 'string', 'max' => 50],
            [['keterangan'], 'string', 'max' => 100]
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'kode' => 'Kode',
            'unit_pengolah' => 'Unit Pengolah',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArsipInaktifs()
    {
        return $this->hasMany(ArsipInaktif::className(), ['kd_pengolah' => 'kode']);
    }
}
