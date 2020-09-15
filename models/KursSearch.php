<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Kurs;

/**
 * KursSearch represents the model behind the search form of `app\models\Kurs`.
 */
class KursSearch extends Kurs
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'points', 'category_id'], 'integer'],
        
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
        $query = Kurs::find();

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
            'points' => $this->points,
            'category_id' => $this->category_id,
        ]);

        $query->andFilterWhere(['like', 'name_uz', $this->name_uz])
            ->andFilterWhere(['like', 'description_uz', $this->description_uz])
            ->andFilterWhere(['like', 'date', $this->date])
            ->andFilterWhere(['like', 'teacher_uz', $this->teacher_uz])
            ->andFilterWhere(['like', 'img', $this->img]);

        return $dataProvider;
    }
}