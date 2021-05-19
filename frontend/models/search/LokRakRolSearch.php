<?php

namespace frontend\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use frontend\models\LokRakRol;

/**
 * LokRakRolSearch represents the model behind the search form about `frontend\models\LokRakRol`.
 */
class LokRakRolSearch extends LokRakRol
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['kode', 'kd_ruang', 'nama_rak'], 'safe'],
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
        $query = LokRakRol::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        $query->andFilterWhere(['like', 'kode', $this->kode])
            ->andFilterWhere(['like', 'kd_ruang', $this->kd_ruang])
            ->andFilterWhere(['like', 'nama_rak', $this->nama_rak]);

        return $dataProvider;
    }
}
