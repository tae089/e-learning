<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\BranchGroup;

/**
 * BranchGroupSearch represents the model behind the search form about `backend\models\BranchGroup`.
 */
class BranchGroupSearch extends BranchGroup
{
    /**
     * @inheritdoc 
     */
    public function rules()
    {
        return [
            [['branch_group_id', 'branch_group_status'], 'integer'],
            [['branch_group_name', 'branch_group_detail'], 'safe'],
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
        $query = BranchGroup::find();

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
            'branch_group_id' => $this->branch_group_id,
            'branch_group_status' => $this->branch_group_status,
        ]);

        $query->andFilterWhere(['like', 'branch_group_name', $this->branch_group_name])
            ->andFilterWhere(['like', 'branch_group_detail', $this->branch_group_detail]);

        return $dataProvider;
    }
}
