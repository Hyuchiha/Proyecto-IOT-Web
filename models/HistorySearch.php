<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\History;

/**
 * HistorySearch represents the model behind the search form about `app\models\History`.
 */
class HistorySearch extends History
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['idhistory', 'parking_idparking'], 'integer'],
            [['plaque_idplaque', 'create_at', 'update_at', 'time_parking'], 'safe'],
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
        $query = History::find();

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
            'idhistory' => $this->idhistory,
            'parking_idparking' => $this->parking_idparking,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'time_parking' => $this->time_parking,
        ]);

        $query->andFilterWhere(['like', 'plaque_idplaque', $this->plaque_idplaque]);

        return $dataProvider;
    }
}
