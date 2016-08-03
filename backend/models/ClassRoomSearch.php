<?php

namespace backend\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use backend\models\ClassRoom;

/**
 * ClassRoomSearch represents the model behind the search form about `backend\models\ClassRoom`.
 */
class ClassRoomSearch extends ClassRoom
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['class_room_id', 'class_room_status'], 'integer'],
            [['class_room_name', 'class_room_detail'], 'safe'],
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
        $query = ClassRoom::find();

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
            'class_room_id' => $this->class_room_id,
            'class_room_status' => $this->class_room_status,
        ]);

        $query->andFilterWhere(['like', 'class_room_name', $this->class_room_name])
            ->andFilterWhere(['like', 'class_room_detail', $this->class_room_detail]);

        return $dataProvider;
    }
}
