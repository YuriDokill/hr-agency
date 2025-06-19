<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "vacancies".
 *
 * @property int $id
 * @property int $employer_id
 * @property string $title
 * @property string $description
 * @property int $category_id
 * @property int $salary
 * @property string $created_at
 *
 * @property User $employer
 * @property JobCategories $category
 */
class Vacancy extends ActiveRecord
{
    public static function tableName()
    {
        return 'vacancies';
    }

    public function rules()
    {
        return [
            [['employer_id', 'title', 'description'], 'required'],
            [['employer_id', 'category_id', 'salary'], 'integer'],
            [['description'], 'string'],
            [['created_at'], 'safe'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'employer_id' => 'Employer ID',
            'title' => 'Title',
            'description' => 'Description',
            'category_id' => 'Category',
            'salary' => 'Salary',
            'created_at' => 'Created At',
        ];
    }

    public function getEmployer()
    {
        return $this->hasOne(User::class, ['id' => 'employer_id']);
    }

    public function getCategory()
    {
        return $this->hasOne(JobCategories::class, ['id' => 'category_id']);
    }
}