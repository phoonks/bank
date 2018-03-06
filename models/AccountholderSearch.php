<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Accountholder;

/**
 * AccountholderSearch represents the model behind the search form of `app\models\Accountholder`.
 */
class AccountholderSearch extends Accountholder
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'postcode'], 'integer'],
            [['identity_card', 'last_name', 'first_name', 'name', 'phone_no', 'country_code', 'date_of_birth', 'address', 'state', 'city', 'country', 'race', 'signature', 'finger_print', 'user_name', 'password', 'last_logging_time', 'email', 'created_at', 'updated_at', 'is_deleted'], 'safe'],
        ];
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
        $query = Accountholder::find();

        // add conditions that should always apply here
        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            //'date_of_birth' => $this->date_of_birth,
            //'last_logging_time' => $this->last_logging_time,
            //'created_at' => $this->created_at,
            'is_deleted' => 0,
            //'updated_at' => $this->updated_at,
        ]);

        //for search similer data
        $query->andFilterWhere(['like', 'identity_card', $this->identity_card])
            ->andFilterWhere(['like', 'phone_no', $this->phone_no])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'city', $this->city]);
            
         return new ActiveDataProvider([
            'query' => $query,
        ]);
    }
}
