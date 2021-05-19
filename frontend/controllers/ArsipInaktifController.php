<?php

namespace frontend\controllers;

use Yii;
use frontend\models\ArsipInaktif;
use frontend\models\search\ArsipInaktifSearch;
use frontend\models\ArsipInaktifReportForm;
use frontend\models\UploadForm;
use common\models\PermissionHelpers;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

/**
 * ArsipInaktifController implements the CRUD actions for ArsipInaktif model.
 */
class ArsipInaktifController extends Controller
{
    public function behaviors()
    {
        return [
            
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['view'],
                        'allow' => TRUE,
                        'roles' => ['?'],
                    ],
                    [
                        'actions' => ['index','create','view'],
                        'allow' => TRUE,
                        'roles' => ['@'],
                        'matchCallback' => function($rule, $action) {
                            return PermissionHelpers::requireMinimumRole('Admin') &&
                            PermissionHelpers::requireStatus('Active');
                        }
                    ],
                    [
                        'actions' => ['update','delete'],
                        'allow' => TRUE,
                        'roles' => ['@'],
                        'matchCallback'=>function($rule, $action) {
                            return PermissionHelpers::requireMinimumRole('SuperUser') &&
                            PermissionHelpers::requireStatus('Active') ;
                        }
                    ]
                ]
            ],
        ];
    }

    /**
     * Lists all ArsipInaktif models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ArsipInaktifSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionCari() {
        $searchModel = new ArsipInaktifSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('cari', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }
    
    public function actionLaporan() 
    {
        $model = new ArsipInaktifReportForm();
        $dataProvider = NULL;
        
        if ($model->load(Yii::$app->request->post()) && $model->validate()) {
            $dataProvider = $model->reportAll();    
        } 
        
        return $this->render('report-all', [
            'model' => $model,
            'dataProvider' => $dataProvider
        ]);    
    }

    /**
     * Displays a single ArsipInaktif model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new ArsipInaktif model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function actionCreate333()
    {
        $model = new ArsipInaktif();
        $model2 = new UploadForm();

        if ($model->load(Yii::$app->request->post()) && $model->save() && Yii::$app->request->isPost) {
            $image = UploadedFile::getInstance($model2, 'image');
            if ($model2->upload()) {
                $image->saveAs(Yii::getAlias('@frontend/web/img/') . 'image.' . $image->extension);
                $model2->image = 'image.' . $image->extension;
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'model2' => $model2,
            ]);
        }
    }

    public function actionViewimage($name){
        $file = Yii::getAlias('@frontend/web/img/' . $name);
        return Yii::$app->response->sendFile($file, NULL, ['inline' => TRUE]);
    }

    public function actionCreate()
    {
        $model = new ArsipInaktif();
        $model2 = new UploadForm();

        if ($model->load(Yii::$app->request->post()) && $model->save() && Yii::$app->request->isPost) {
            $model2->imageFile = UploadedFile::getInstance($model2, 'imageFile');
            if ($model2->upload()) {
                return $this->redirect(['view', 'id' => $model->id]);
            }
        } else {
            return $this->render('create', [
                'model' => $model,
                'model2' => $model2,
            ]);
        }
    }

    public function actionUpload()
    {
        $model = new UploadForm();

        if (Yii::$app->request->isPost) {
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');
            if ($model->upload()) {
                // file is uploaded successfully
                return;
            }
        }

        return $this->render('upload', ['model' => $model]);
    }

    /**
     * Updates an existing ArsipInaktif model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing ArsipInaktif model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the ArsipInaktif model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return ArsipInaktif the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = ArsipInaktif::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
