<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;
use Yii;
class VacancySearch extends Vacancy
{
    public function rules()
    {
        return [
            [['id', 'employer_id', 'category_id', 'salary'], 'integer'],
            [['title', 'description'], 'safe'],
        ];
    }

    public function search($params)
    {
        $query = Vacancy::find();

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        // Фильтр для работодателя
        if (Yii::$app->user->identity->role === User::ROLE_EMPLOYER) {
            $query->andWhere(['employer_id' => Yii::$app->user->id]);
        }

        $query->andFilterWhere([
            'id' => $this->id,
            'category_id' => $this->category_id,
            'salary' => $this->salary,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }

    public function searchPublic($params)
    {
        $query = Vacancy::find()
            ->joinWith('employer')
            ->orderBy(['created_at' => SORT_DESC]);

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        if (!$this->validate()) {
            return $dataProvider;
        }

        $query->andFilterWhere([
            'category_id' => $this->category_id,
            'salary' => $this->salary,
        ]);

        $query->andFilterWhere(['like', 'title', $this->title])
            ->andFilterWhere(['like', 'description', $this->description]);

        return $dataProvider;
    }
}