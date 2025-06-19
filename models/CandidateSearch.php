<?php
namespace app\models;

use yii\base\Model;
use yii\data\ActiveDataProvider;

class CandidateSearch extends Candidate
{
    public $position;
    public $skills;
    public $experience;
    public $min_salary;
    public $max_salary;

  public function rules()
{
    return [
        [['min_salary', 'max_salary'], 'integer', 'min' => 0],
        [['skills'], 'string', 'max' => 255],
        [['experience'], 'integer', 'min' => 0],
        [['min_salary', 'max_salary', 'skills', 'experience'], 'safe'],
        [['position'], 'safe']
    ];
}

    public function search($params)
    {
        $query = Candidate::find()
            ->joinWith('resume r');

        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => 10,
            ],
        ]);

        $this->load($params);

        $query->andFilterWhere(['LIKE', 'position', $this->position]);

        if (!$this->validate()) {
            return $dataProvider;
        }

    $query->andFilterWhere(['like', 'r.skills', $this->skills]);
    $query->andFilterWhere(['r.experience' => $this->experience]);
    $query->andFilterWhere(['like', 'LOWER(r.skills)', strtolower($this->skills)]);
    $query->andFilterWhere(['>=', 'r.expected_salary', $this->min_salary])->andFilterWhere(['<=', 'r.expected_salary', $this->max_salary]);
    $query->andFilterWhere(['between', 'r.expected_salary', $this->min_salary, $this->max_salary]);

    return new ActiveDataProvider(['query' => $query]);
    }
}
?>