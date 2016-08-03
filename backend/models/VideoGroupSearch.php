<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\VideoGroup;

/**
 * VideoGroupSearch represents the model behind the search form about `backend\models\VideoGroup`.
 */
class VideoGroupSearch extends VideoGroup
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['video_group_id', 'video_group_status'], 'integer'],
            [['video_group_name', 'video_group_detail'], 'safe'],
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
        $query = VideoGroup::find();

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
            'video_group_id' => $this->video_group_id,
            'video_group_status' => $this->video_group_status,
        ]);

        $query->andFilterWhere(['like', 'video_group_name', $this->video_group_name])
            ->andFilterWhere(['like', 'video_group_detail', $this->video_group_detail]);

        return $dataProvider;
    }
}
