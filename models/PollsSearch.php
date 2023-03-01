<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Polls;

/**
 * PollsSearch represents the model behind the search form of `app\models\Polls`.
 */
class PollsSearch extends Polls {

    public $tsCreateString;

    /**
     * {@inheritdoc}
     */
    public function rules() {
        return [
            [['id', 'tsCreate', 'gender', 'rating', 'questionId'], 'integer'],
            [['phone', 'email', 'area', 'city', 'comment', 'tsCreateString'], 'safe'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function scenarios() {
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
    public function search($params) {
        $query = Polls::find();

        // add conditions that should always apply here

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            // uncomment the following line if you do not want to return any records when validation fails
            // $query->where('0=1');
            print_r($this->errors,true);
            return $dataProvider;
        }

        // grid filtering conditions
        $query->andFilterWhere([
            'id' => $this->id,
            'tsCreate' => $this->tsCreate,
            'gender' => $this->gender,
            'rating' => $this->rating,
            'questionId' => $this->questionId,
        ]);

        $query->andFilterWhere(['like', 'phone', $this->phone])
                ->andFilterWhere(['like', 'email', $this->email])
                ->andFilterWhere(['like', 'area', $this->area])
                ->andFilterWhere(['like', 'city', $this->city])
                ->andFilterWhere(['like', 'comment', $this->comment]);

        if ($this->tsCreateString) {
            $min = strtotime($this->tsCreateString);
            $max = strtotime('+1 days', $min);
            $query->andWhere(['between', 'tsCreate', $min, $max]);
        }

        return $dataProvider;
    }

}
