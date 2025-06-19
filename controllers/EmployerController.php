<?php
namespace app\controllers;

use app\models\CandidateSearch;
use Yii;
use yii\web\Controller;
use app\models\Resume;
use app\models\User;
use yii\filters\AccessControl;

class EmployerController extends Controller
{
    public function actionSearch()
    {
        $searchModel = new CandidateSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        $dataProvider->query->with(['resume']);

        return $this->render('search', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]); 
    }

    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['search'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['create-vacancy'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->role === User::ROLE_EMPLOYER;
                        }
                    ],
                    [
                        'actions' => ['create-resume'],
                        'allow' => true,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return Yii::$app->user->identity->role === User::ROLE_CANDIDATE;
                        }
                    ],
                // Добавьте это правило для гостей:
                    [
                        'allow' => true,
                        'actions' => ['search'],
                        'roles' => ['?'],
                        'denyCallback' => function ($rule, $action) {
                            return Yii::$app->response->redirect(['site/auth']);
                        }
                    ],
                ],
            ],
        ];
    }
}
?>