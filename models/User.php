<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

class User extends ActiveRecord implements IdentityInterface
{
    const ROLE_CANDIDATE = 'candidate';
    const ROLE_EMPLOYER = 'employer';
    const SCENARIO_SIGNUP = 'signup';

    public function scenarios()
    {
        return [
            self::SCENARIO_SIGNUP => ['username', 'email', 'password', 'role'],
            self::SCENARIO_DEFAULT => ['username', 'email', 'password_hash', 'auth_key', 'role'],
        ];
    }

    public static function tableName()
    {
        return 'user';
    }

    public $password;

    /**
     * {@inheritdoc}
     */
    public static function findIdentity($id)
    {
        return static::findOne($id);
    }

    /**
     * {@inheritdoc}
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * Finds user by username
     *
     * @param string $username
     * @return static|null
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username]);
    }

    /**
     * {@inheritdoc}
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * {@inheritdoc}
     */
    public function getAuthKey()
    {
        return $this->auth_key; // поле должно существовать в таблице
    }

    /**
     * {@inheritdoc}
     */
    public function validateAuthKey($authKey)
    {
        return $this->auth_key === $authKey;
    }

    /**
     * Validates password
     *
     * @param string $password password to validate
     * @return bool
     */
    public function validatePassword($password)
    {
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }

    public function rules()
    {
        return [
            ['email', 'email'],
            ['username', 'unique', 'targetClass' => self::class, 'message' => 'Это имя уже занято'],
            ['email', 'unique', 'targetClass' => self::class, 'message' => 'Этот email уже зареган'],
            ['password', 'string', 'min' => 6],
            [['username', 'email', 'password'], 'required', 'message' => '', 'on' => self::SCENARIO_SIGNUP],
            ['role', 'required', 'message' => 'Пожалуйста, выберите вашу роль', 'on' => self::SCENARIO_SIGNUP],
            ['role', 'in', 'range' => [self::ROLE_CANDIDATE, self::ROLE_EMPLOYER]],
        ];
    }

    public function getVacancies()
    {
        return $this->hasMany(Vacancy::class, ['employer_id' => 'id']);
    }

    public function getCandidateProfile()
    {
        return $this->hasOne(Candidate::class, ['user_id' => 'id']);
    }

}