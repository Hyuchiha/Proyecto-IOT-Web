<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Parking;

/**
 * ParkingSearch represents the model behind the search form about `app\models\Parking`.
 */
class ParkingSearch extends Parking
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_parking', 'current_status'], 'integer'],
            [['min_time', 'max_time', 'average_time'], 'safe'],
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
        $query = Parking::find();

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
            'id_parking' => $this->id_parking,
            'min_time' => $this->min_time,
            'max_time' => $this->max_time,
            'average_time' => $this->average_time,
            'current_status' => $this->current_status,
        ]);

        return $dataProvider;
    }
}
