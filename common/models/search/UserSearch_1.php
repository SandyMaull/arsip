<?php

namespace common\models\search;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\User;

/**
 * UserSearch represents the model behind the search form about `common\models\User`.
 */
class UserSearch extends User
{
    public $roleName;
    public $statusName;
    public $profileId;
    public $userLink;


    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'role_id', 'status_id'], 'integer'],
            [['username', 'email', 'created_at', 'updated_at','roleName','statusName','profileId'], 'safe'],
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
        $query = User::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);
        
        $dataProvider->setSort([
            'attributes' => [
                'id',
                'userIdLink' => [
                    'asc' => ['user.id' => SORT_ASC],
                    'desc' => ['user.id' => SORT_DESC],
                    'label' => 'User'
                ],
                'userLink' => [
                    'asc' => ['user.username' => SORT_ASC],
                    'desc' => ['user.username' => SORT_DESC],
                    'label' => 'User'
                ],
                'profileLink' => [
                    'asc' => ['profile.id' => SORT_ASC],
                    'desc' => ['profile.id' => SORT_DESC],
                    'label' => 'Profile'
                ],
                'roleName' => [
                    'asc' => ['role.role_name' => SORT_ASC],
                    'desc' => ['role.role_name' => SORT_DESC],
                    'label' => 'Role'
                ],
                'statusName' => [
                    'asc' => ['status.status_name' => SORT_ASC],
                    'desc' => ['status.status_name' => SORT_DESC],
                    'label' => 'Status'
                ],
                'created_at' => [
                    'asc' => ['created_at' => SORT_ASC],
                    'desc' => ['created_at' => SORT_DESC],
                    'label' => 'Created At'
                ],
                'email' => [
                    'asc' => ['email' => SORT_ASC],
                    'desc' => ['email' => SORT_DESC],
                    'label' => 'Email'
                ],
            ]
        ]);

        if (!($this->load($params) && $this->validate())) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            $query->joinWith(['role'])
                    ->joinWith(['status'])
                    ->joinWith(['profile']);
            
            return $dataProvider;
        }
        
        $this->addSearchParameter($query, 'id');
        $this->addSearchParameter($query, 'user.username', TRUE);
        $this->addSearchParameter($query, 'email', TRUE);
        $this->addSearchParameter($query, 'role_id');
        $this->addSearchParameter($query, 'status_id');
        $this->addSearchParameter($query, 'created_at');
        $this->addSearchParameter($query, 'updated_at');
        
        //Filter by Role
        $query->joinWith(['role' => function ($q) {
            $q->andFilterWhere(['=', 'role.role_name', $this->roleName]);
        }])
        //Filter by Status
            ->joinWith(['status' => function ($q) {
                $q->andFilterWhere(['=', 'status.status_name', $this->statusName]);
        }])
        //Filter by Profile
            ->joinWith(['profile' => function($q) {
                $q->andFilterWhere(['=', 'profile.id', $this->profileId]);
            }]);
       
        return $dataProvider;
    }
    
    protected function addSearchParameter($query, $attribute, $partialMatch = FALSE) {
        if (($pos = strrpos($attribute, '.')) !== FALSE) {
            $modelAttribute = substr($attribute, $pos + 1);
        }else {
            $modelAttribute = $attribute;
        }
        $value = $this->$modelAttribute;
        
        if (trim($value) === '') {
            return;
        }
        
        $attribute = "user.$attribute";
        if ($partialMatch) {
            $query->andWhere(['LIKE', $attribute, $value]);
        } else {
            $query->andWhere([$attribute => $value]);
        }
    }
}
