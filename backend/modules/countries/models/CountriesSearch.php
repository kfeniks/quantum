<?php

namespace app\modules\countries\models;

use Yii;
use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\modules\countries\models\Countries;

/**
 * CountriesSearch represents the model behind the search form of `app\modules\countries\models\Countries`.
 */
class CountriesSearch extends Countries
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'phonecode'], 'integer'],
            [['sortname', 'name'], 'safe'],
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
        $query = Countries::find();

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
            'phonecode' => $this->phonecode,
        ]);

        $query->andFilterWhere(['like', 'sortname', $this->sortname])
            ->andFilterWhere(['like', 'name', $this->name]);

        return $dataProvider;
    }
}
