<?php

namespace app\controllers;

use app\models\User;
use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;

class SiteController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout', 'auth'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['auth'],
                        'allow' => true,
                        'roles' => ['?'], // Только гости
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(), // Исправлено на ::className()
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

   

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }

    /**
     * Login action.
     *
     * @return Response|string
     */
    
    public function actionAuth()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $loginModel = new LoginForm();
        $signupModel = new User();
        $signupModel->scenario = User::SCENARIO_SIGNUP;

    // Обработка входа
        if ($loginModel->load(Yii::$app->request->post()) && $loginModel->login()) {
            return $this->goBack();
        }

    // Обработка регистрации
        if ($signupModel->load(Yii::$app->request->post())) {
            $signupModel->password_hash = Yii::$app->security->generatePasswordHash($signupModel->password);
            $signupModel->auth_key = Yii::$app->security->generateRandomString();
            $signupModel->role = $signupModel->role ?? User::ROLE_CANDIDATE;
    
            if ($signupModel->save()) {
                Yii::$app->user->login($signupModel);
                return $this->goHome();
            }
        }

        return $this->render('auth', [
            'loginModel' => $loginModel,
            'signupModel' => $signupModel,
        ]);
    }


    /**
     * Logout action.
     *
     * @return Response
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return Response|string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    public function actionAccessDenied()
    {
        return $this->render('access-denied');
    }
}
