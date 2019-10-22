<?php

namespace common\models\search;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EOrders;

/**
 * EOrdersSearch represents the model behind the search form of `common\models\EOrders`.
 */
class EOrdersSearch extends EOrders
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'shop_id', 'paySystem'], 'integer'],
            [['status_code', 'status_text', 'comment', 'fio', 'email', 'phone', 'address', 'city', 'delivery', 'basket'], 'safe'],
            [['price', 'delivery_price'], 'number'],
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
        $query = EOrders::find();

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
            'shop_id' => $this->shop_id,
            'price' => $this->price,
            'delivery_price' => $this->delivery_price,
            'paySystem' => $this->paySystem,
        ]);

        $query->andFilterWhere(['like', 'status_code', $this->status_code])
            ->andFilterWhere(['like', 'status_text', $this->status_text])
            ->andFilterWhere(['like', 'comment', $this->comment])
            ->andFilterWhere(['like', 'fio', $this->fio])
            ->andFilterWhere(['like', 'email', $this->email])
            ->andFilterWhere(['like', 'phone', $this->phone])
            ->andFilterWhere(['like', 'address', $this->address])
            ->andFilterWhere(['like', 'city', $this->city])
            ->andFilterWhere(['like', 'delivery', $this->delivery])
            ->andFilterWhere(['like', 'basket', $this->basket]);

        return $dataProvider;
    }
}
