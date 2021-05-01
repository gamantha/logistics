<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\FreightRate;

/**
 * FreightRateSearch represents the model behind the search form of `app\models\FreightRate`.
 */
class FreightRateSearch extends FreightRate
{

    public $shipping;
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'shippingId'], 'integer'],
            [['route_from', 'route_to', 'mode_of_transport', 'currency', 'rate', 'unit', 'type', 'status', 'created_at', 'updated_at','shipping'], 'safe'],
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
        $query = FreightRate::find();

        $query->joinWith(['shipping']);

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $dataProvider->sort->attributes['shipping'] = [
            // The tables are the ones our relation are configured to
            // in my case they are prefixed with "tbl_"
            'asc' => ['shipping.name' => SORT_ASC],
            'desc' => ['shipping.name' => SORT_DESC],
        ];


        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'shippingId' => $this->shippingId,
            'created_at' => $this->created_at,
            'updated_at' => $this->updated_at,
        ]);

        $query->andFilterWhere(['like', 'route_from', $this->route_from])
            ->andFilterWhere(['like', 'route_to', $this->route_to])
            ->andFilterWhere(['like', 'mode_of_transport', $this->mode_of_transport])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'rate', $this->rate])
            ->andFilterWhere(['like', 'unit', $this->unit])
            ->andFilterWhere(['like', 'type', $this->type])
            ->andFilterWhere(['like', 'status', $this->status])
            ->andFilterWhere(['like', 'shipping.name', $this->shipping])
        ;
        ;

        return $dataProvider;
    }
}
