<?php

namespace frontend\models;

use Yii;

/**
 * This is the model class for table "jenis_media".
 *
 * @property integer $kode
 * @property string $jenis_media
 * @property string $keterangan
 *
 * @property ArsipInaktif[] $arsipInaktifs
 */
class JenisMedia extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'jenis_media';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'jenis_media'], 'required'],
            [['kode'], 'string', 'max' => 10],
            [['jenis_media'], 'string', 'max' => 50],
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
            'jenis_media' => 'Jenis Media',
            'keterangan' => 'Keterangan',
        ];
    }

    /**
     * @return \yii\db\ActiveQuery
     */
    public function getArsipInaktifs()
    {
        return $this->hasMany(ArsipInaktif::className(), ['kd_media' => 'kode']);
    }
}
