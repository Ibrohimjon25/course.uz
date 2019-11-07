<?php

namespace app\controllers;

use Yii;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Bookk;
use app\models\Register;
use app\models\Kurs;
use yii\web\UploadedFile;
use app\models\CategoryCourse;

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
                'only' => ['logout', 'register', 'course'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['register'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['course'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    [
                        'actions' => ['book'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
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

    public function actionDownload($id){
        $download = Kurs::findOne($id); 
        $path = Yii::getAlias('@webroot').'/fayl/'.$download->fayl;
        
        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path);
        }

    }

    public function actionDownloadd($id){
        $download = Bookk::findOne($id); 
        $path = Yii::getAlias('@webroot').'/books/'.$download->kitob;
        
        if (file_exists($path)) {
            return Yii::$app->response->sendFile($path);
        }

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

    public function actionSearch($q){
        // $q = Yii::$app->request->post('q');
        
        $query = Kurs::find()->where(['like', 'name_uz', $q])->all();
        return $this->render('search', [
            'query'=> $query,
            'q'=>$q,
        ]);
    }


    public function actionCategoryCourse(){
        return $this->render('category-course');
    }

    public function actionCourse(){
        return $this->render('course');
    }

    public function actionKurs($id){
        $model = Kurs::find()->where(['category_id'=>$id])->all();
        return $this->render('kurs',[
            'model'=>$model
        ]);
    }

    public function actionBook()
    {
        return $this->render('book');
    }
    /**
     * Login action.
     *
     * @return Response|string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }

        $model->password = '';
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    public function actionRegister()
    {
        $model = new Register();
 
        if ($model->load(Yii::$app->request->post())) {
            if ($user = $model->register()) {
                if (Yii::$app->getUser()->login($user)) {
                    return $this->goHome();
                }
            }
        }
 
        return $this->render('register', [
            'model' => $model,
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
}
