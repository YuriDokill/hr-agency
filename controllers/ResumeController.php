<?php
namespace app\controllers;

use Yii;
use yii\web\Controller;
use yii\filters\AccessControl;
use app\models\User;

class ResumeController extends Controller
{
      public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['create-vacancy'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->role === User::ROLE_EMPLOYER;
                        }
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create-resume'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->role === User::ROLE_CANDIDATE;
                        }
                    ],
                ],
            ],
        ];
    }

    public function actionCreate()
    {
       
    }
}
?>