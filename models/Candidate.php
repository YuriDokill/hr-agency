<?php
namespace app\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "candidate".
 *
 * @property int $id
 * @property string $name
 * @property string $email
 * @property string|null $phone
 * @property string $created_at
 *
 * @property Resume $resume  // Изменили на единственное число
 */
class Candidate extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'candidate';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['phone'], 'default', 'value' => null],
            [['name', 'email'], 'required'],
            [['created_at'], 'safe'],
            [['name', 'email'], 'string', 'max' => 100],
            [['phone'], 'string', 'max' => 20],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'email' => 'Email',
            'phone' => 'Phone',
            'created_at' => 'Created At',
        ];
    }

    /**
     * Связь с резюме (один-к-одному)
     * @return \yii\db\ActiveQuery
     */
    public function getResume()  // Изменили на единственное число
    {
        return $this->hasOne(Resume::class, ['candidate_id' => 'id']);
    }
}
?>