<?php

namespace backend\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\Branches;

/**
 * BranchSearch represents the model behind the search form of `backend\models\Branches`.
 */
class BranchSearch extends Branches
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id'], 'integer'],
            [['branch', 'contact', 'county', 'sub_county', 'saved_at'], 'safe'],
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
        $query = Branches::find();

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
            'saved_at' => $this->saved_at,
        ]);

        $query->andFilterWhere(['like', 'branch', $this->branch])
            ->andFilterWhere(['like', 'contact', $this->contact])
            ->andFilterWhere(['like', 'county', $this->county])
            ->andFilterWhere(['like', 'sub_county', $this->sub_county]);

        return $dataProvider;
    }
}
