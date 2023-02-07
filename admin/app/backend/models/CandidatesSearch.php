<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Candidates;


/**
 * CandidatesSearch represents the model behind the search form of `backend\models\Candidates`.
 */
class CandidatesSearch extends Candidates
{
    public $catNameSearch;

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'votes', 'status', 'category_id'], 'integer'],
            [['catNameSearch','name', 'inserted_at'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
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
        $query = Candidates::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'votes' => $this->votes,
            'status' => $this->status,
            'category_id' => $this->category_id,
            'inserted_at' => $this->inserted_at,
        ]);

        $query->andFilterWhere(['like', 'name', $this->name]);
        // $query->andFilterWhere(['like', 'category_id', $this->name]);

        return $dataProvider;
    }
}
