<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Kurs;
use app\models\KursSearch;
use yii\web\Controller; 
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * KursController implements the CRUD actions for Kurs model.
 */
class KursController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index'],
                'rules' => [
                    [
                        'actions' => ['index'],
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
     * Lists all Kurs models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new KursSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Kurs model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Kurs model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
     public function actionCreate()
    {
        $model = new Kurs();
        if ($model->load(Yii::$app->request->post())) {
            $model->name_uz = json_encode($model->translate_name, JSON_UNESCAPED_UNICODE);
            $model->teacher_uz = json_encode($model->translate_teacher, JSON_UNESCAPED_UNICODE);
            $model->description_uz = json_encode($model->translate_description, JSON_UNESCAPED_UNICODE);
            
            $imgfile = UploadedFile::getInstance($model, 'img');
            $videofile = UploadedFile::getInstance($model, 'fayl');
            
            if (isset($imgfile->size) && isset($videofile->size)) {
                
                $imgfile->saveAs('img/'.$imgfile->baseName.'.'.$imgfile->extension);
                $videofile->saveAs('fayl/'.$videofile->baseName.'.'.$videofile->extension);
            }
            $model->img = $imgfile->baseName.'.'.$imgfile->extension;
            $model->fayl = $videofile->baseName.'.'.$videofile->extension;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Message model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */

    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        if ($model->load(Yii::$app->request->post())) {

            $model->name_uz = json_encode($model->translate_name, JSON_UNESCAPED_UNICODE);
            $model->avtor_uz = json_encode($model->translate_teacher, JSON_UNESCAPED_UNICODE);
            $model->description_uz = json_encode($model->translate_description, JSON_UNESCAPED_UNICODE);
            

            $imgfile = UploadedFile::getInstance($model, 'img');
            $videofile = UploadedFile::getInstance($model, 'fayl');
            
            if (isset($imgfile->size) && isset($videofile->size)) {
                
                $imgfile->saveAs('img/'.$imgfile->baseName.'.'.$imgfile->extension);
                $videofile->saveAs('fayl/'.$videofile->baseName.'.'.$videofile->extension);
            }
            $model->img = $imgfile->baseName.'.'.$imgfile->extension;
            $model->fayl = $videofile->baseName.'.'.$videofile->extension;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->name_uz = json_encode($model->translate_name, JSON_UNESCAPED_UNICODE);
        $model->teacher_uz = json_encode($model->translate_teacher, JSON_UNESCAPED_UNICODE);
        $model->description_uz = json_encode($model->translate_description, JSON_UNESCAPED_UNICODE);
            
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Kurs model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Kurs model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Kurs the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Kurs::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
