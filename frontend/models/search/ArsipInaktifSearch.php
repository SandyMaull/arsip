<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\ArsipInaktif;

/**
 * ArsipInaktifSearch represents the model behind the search form about `frontend\models\ArsipInaktif`.
 */
class ArsipInaktifSearch extends ArsipInaktif
{
    /**
     * @inheritdoc
     */
    public $linkArsip;

    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['no_box','no_fisis', 'kd_masalah', 'kd_pengolah', 'kd_media', 'linkArsip','kurun_waktu', 'kd_ruang', 'kd_rak'], 'safe'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }

    /**
     * Creates data provider instance with search query applied
     *
     * @param array $params
     *
     * @return ActiveDataProvider
     */
    public function search($params)
    {
        $query = ArsipInaktif::find();
        
        $query->joinWith(['kdPengolah','kdRak']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'no_fisis',
                'kd_masalah',
                'unitPengolah' => [
                    'asc' => ['kdPengolah.unit_pengolah' => SORT_ASC],
                    'desc' => ['kdPengolah.unit_pengolah' => SORT_DESC],
                    'label' => 'Unit Pengolah'
                ],
                'kurun_waktu',
                'kd_rak',
                'no_box'
            ]
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            
        ]);

        $query->andFilterWhere(['like', 'no_fisis', $this->no_fisis])
			->andFilterWhere(['like', 'no_box', $this->no_box])
            ->andFilterWhere(['like', 'kd_masalah', $this->kd_masalah])
            ->andFilterWhere(['like', 'unit_pengolah.unit_pengolah', $this->kd_pengolah])
            //->andFilterWhere(['like', 'kd_media', $this->kd_media])
            ->andFilterWhere(['like', 'uraian', $this->linkArsip])
            ->andFilterWhere(['like', 'kurun_waktu', $this->kurun_waktu])
            ->andFilterWhere(['like', 'kd_ruang', $this->kd_ruang])
            ->andFilterWhere(['like', 'lok_rak_rol.nama_rak', $this->kd_rak]);

        return $dataProvider;
    }
}
