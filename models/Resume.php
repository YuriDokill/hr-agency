<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "resume".
 *
 * @property int $id
 * @property int $candidate_id
 * @property string $skills
 * @property int|null $experience
 * @property int|null $expected_salary
 * @property string|null $file
 *
 * @property Candidate $candidate
 */
class Resume extends \yii\db\ActiveRecord
{
    public $photo;
    public $position;
    public $about;

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'resume';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['expected_salary', 'file'], 'default', 'value' => null],
            [['experience'], 'default', 'value' => 0],
            [['candidate_id', 'skills'], 'required'],
            [['candidate_id', 'experience', 'expected_salary'], 'integer'],
            [['skills'], 'string'],
            [['file'], 'string', 'max' => 255],
            [['candidate_id'], 'exist', 'skipOnError' => true, 'targetClass' => Candidate::class, 'targetAttribute' => ['candidate_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'candidate_id' => 'Candidate ID',
            'skills' => 'Skills',
            'experience' => 'Experience',
            'expected_salary' => 'Expected Salary',
            'file' => 'File',
        ];
    }

    /**
     * Gets query for [[Candidate]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getCandidate()
    {
        return $this->hasOne(Candidate::class, ['id' => 'candidate_id']);
    }

}
