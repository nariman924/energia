<?php

namespace common\models\search;

use common\models\ECategories;
use common\models\ECategoriesOffers;
use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use common\models\EOffers;
use yii\db\Query;

/**
 * EOffersSearch represents the model behind the search form about `common\models\EOffers`.
 */
class EOffersSearch extends EOffers
{
    public $category;
    public $priceFrom;
    public $priceTo;

    public function formName()
    {
        return 'filter';
    }

    public function urlFilter($attr, $val)
    {
        return $this->formName() . '[' . $attr . ']=' . $val;
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['id', 'available', 'qty'], 'integer'],
            [['shop_url', 'currency', 'vendor_code', 'shop_anons_pic',
                'anons_pic', 'name', 'vendor', 'description', 'category'
            ], 'safe'],
            [['price', 'priceFrom', 'priceTo'], 'number'],
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
        $query = EOffers::find()->alias('off');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        if (!($this->load($params) && $this->validate())) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'available' => $this->available,
            'price' => $this->price,
            'qty' => $this->qty,
        ]);

        if ($this->category) {
            $subQuery = (new Query())->select(['off.id'])
                ->from(['off' => EOffers::tableName()])
                ->leftJoin(['catoff' => ECategoriesOffers::tableName()], 'catoff.offer_id = off.id')
                ->leftJoin(['cat' => ECategories::tableName()], 'cat.id = catoff.category_id')
                ->andWhere(['OR', ['cat.shop_id' => $this->category], ['cat.shop_parent_id' => $this->category]])
                ->column();

            $subQuery =  $subQuery ?: 0;

            $query->andFilterWhere(['off.id' => $subQuery]);
        }

        $query->andFilterWhere(['like', 'shop_url', $this->shop_url])
            ->andFilterWhere(['like', 'currency', $this->currency])
            ->andFilterWhere(['like', 'vendor_code', $this->vendor_code])
            ->andFilterWhere(['like', 'shop_anons_pic', $this->shop_anons_pic])
            ->andFilterWhere(['like', 'anons_pic', $this->anons_pic])
            ->andFilterWhere(['like', 'name', $this->name])
            ->andFilterWhere(['like', 'vendor', $this->vendor])
            ->andFilterWhere(['like', 'description', $this->description])
            ->andFilterWhere(['>=', 'price', $this->priceFrom])
            ->andFilterWhere(['<=', 'price', $this->priceTo]);

        return $dataProvider;
    }
}
