<?php

namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use app\models\Workplace;

/**
 * CvWorkplaceSearch represents the model behind the search form of `app\models\CvWorkplace`.
 */
class WorkplaceSearch extends Workplace
{
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['id', 'cv_id'], 'integer'],
            [['workplace_name', 'position', 'types_of_work_schedules', 'work_experience', 'created_at'], 'safe'],
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
        $query = Workplace::find();

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
            'cv_id' => $this->cv_id,
            'created_at' => $this->created_at,
        ]);

        $query->andFilterWhere(['like', 'workplace_name', $this->workplace_name])
            ->andFilterWhere(['like', 'position', $this->position])
            ->andFilterWhere(['like', 'types_of_work_schedules', $this->types_of_work_schedules])
            ->andFilterWhere(['like', 'work_experience', $this->work_experience]);

        return $dataProvider;
    }
}
