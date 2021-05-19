<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\Profile;

/**
 * ProfileSearch represents the model behind the search form about `common\models\Profile`.
 */
class ProfileSearch extends Profile
{
    public $genderName;
    public $gender_id;
    public $userLink;
    
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'gender_id'], 'integer'],
            [['first_name', 'last_name', 'birthdate', 'genderName', 'userLink'], 'safe'],
        ];
    }
    public function attributeLabels() 
    {
        return [
            'gender_id' => 'Gender',
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
        $query = Profile::find();
        
        $query->joinWith(['gender'])
                ->joinWith(['user']);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->setSort([
           'attributes' => [
               'id',
               'first_name',
               'last_name',
               'birthdate',
               'genderName' => [
                   'asc' => ['gender.gender_name' => SORT_ASC],
                   'desc' => ['gender.gender_name' => SORT_DESC],
                   'label' => 'Gender'
               ],
               'profileIdLink' => [
                   'asc' => ['profile.id' => SORT_ASC],
                   'desc' => ['profile.id' => SORT_DESC],
                   'label' => 'ID'
               ],
               'userLink' => [
                   'asc' => ['user.username' => SORT_ASC],
                   'desc' => ['user.username' => SORT_DESC],
                   'label' => 'User'
               ]
           ] 
        ]);
        
        if (!($this->load($params) && $this->validate())) {            
            
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'user_id' => $this->user_id,
            'birthdate' => $this->birthdate,
            'gender_id' => $this->gender_id,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
            'gender.gender_name' => $this->genderName,
        ]);
        
        $query->andFilterWhere(['like', 'first_name', $this->first_name])
                ->andFilterWhere(['like', 'last_name', $this->last_name])
                ->andFilterWhere(['like', 'user.username', $this->userLink]);

        return $dataProvider;
    }
   
}
