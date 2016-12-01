<?php

namespace app\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Record;

/**
 * RecordSearch represents the model behind the search form about `app\models\Record`.
 */
class RecordSearch extends Record
{
    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id_record', 'parking_id_parking'], 'integer'],
            [['create_at', 'update_at', 'time_parking'], 'safe'],
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
        $query = Record::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'sort' => array(
                'defaultOrder' => [
                    'create_at' => SORT_DESC,
                ],
            ),
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }
        
        // grid filtering conditions
        $query->andFilterWhere([
            'id_record' => $this->id_record,
            'parking_id_parking' => $this->parking_id_parking,
            'create_at' => $this->create_at,
            'update_at' => $this->update_at,
            'time_parking' => $this->time_parking,
        ]);
        
        return $dataProvider;
    }
}
