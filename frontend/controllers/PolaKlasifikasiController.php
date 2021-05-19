<?php

namespace frontend\controllers;

use Yii;
use frontend\models\PolaKlasifikasi;
use frontend\models\search\PolaKlasifikasiSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;
use common\models\PermissionHelpers;

/**
 * PolaKlasifikasiController implements the CRUD actions for PolaKlasifikasi model.
 */
class PolaKlasifikasiController extends Controller
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
     * Lists all PolaKlasifikasi models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new PolaKlasifikasiSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single PolaKlasifikasi model.
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
     * Creates a new PolaKlasifikasi model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new PolaKlasifikasi();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing PolaKlasifikasi model.
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
     * Deletes an existing PolaKlasifikasi model.
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
     * Finds the PolaKlasifikasi model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return PolaKlasifikasi the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = PolaKlasifikasi::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
