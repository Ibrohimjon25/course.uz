<?php

namespace app\modules\admin\controllers;

use Yii;
use app\models\Bookk;
use app\models\BookkSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use yii\filters\AccessControl;

/**
 * BookkController implements the CRUD actions for Bookk model.
 */
class BookkController extends Controller
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
     * Lists all Bookk models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new BookkSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Bookk model.
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
     * Creates a new Bookk model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
   public function actionCreate()
    {
        $model = new Bookk();
        if ($model->load(Yii::$app->request->post())) {
            $model->name_uz = json_encode($model->translate_name, JSON_UNESCAPED_UNICODE);
            $model->avtor_uz = json_encode($model->translate_avtor, JSON_UNESCAPED_UNICODE);
            $model->description_uz = json_encode($model->translate_description, JSON_UNESCAPED_UNICODE);
            
            $imgfile = UploadedFile::getInstance($model, 'img');
            $bookfile = UploadedFile::getInstance($model, 'kitob');
            
            if (isset($imgfile->size) && isset($bookfile->size)) {
                
                $imgfile->saveAs('img/'.$imgfile->baseName.'.'.$imgfile->extension);
                $bookfile->saveAs('books/'.$bookfile->baseName.'.'.$bookfile->extension);
            }
            $model->img = $imgfile->baseName.'.'.$imgfile->extension;
            $model->kitob = $bookfile->baseName.'.'.$bookfile->extension;
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
            $model->avtor_uz = json_encode($model->translate_avtor, JSON_UNESCAPED_UNICODE);
            $model->description_uz = json_encode($model->translate_description, JSON_UNESCAPED_UNICODE);

            $imgfile = UploadedFile::getInstance($model, 'img');
            $bookfile = UploadedFile::getInstance($model, 'kitob');
            
            if (isset($imgfile->size) && isset($bookfile->size)) {
                
                $imgfile->saveAs('img/'.$imgfile->baseName.'.'.$imgfile->extension);
                $bookfile->saveAs('books/'.$bookfile->baseName.'.'.$bookfile->extension);
            }
            $model->img = $imgfile->baseName.'.'.$imgfile->extension;
            $model->kitob = $bookfile->baseName.'.'.$bookfile->extension;
            $model->save(false);
            return $this->redirect(['view', 'id' => $model->id]);
        }
        $model->translate_name = json_decode($model->name_uz, true);
        $model->translate_description = json_decode($model->description_uz, true);
        $model->translate_avtor = json_decode($model->avtor_uz, true);
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Bookk model.
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
     * Finds the Bookk model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Bookk the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Bookk::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }
}
