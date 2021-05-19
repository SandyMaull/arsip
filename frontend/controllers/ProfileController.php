<?php

namespace frontend\controllers;

use Yii;
use common\models\Profile;
use common\models\search\ProfileSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use common\models\PermissionHelpers;
use common\models\RecordHelper;

/**
 * ProfileController implements the CRUD actions for Profile model.
 */
class ProfileController extends Controller
{
    public function behaviors()
    {
        return [
            'access' => [
                'class' => \yii\filters\AccessControl::ClassName(),
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'actions' => ['index','view','create','update','delete'],
                        'allow' => TRUE,
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return PermissionHelpers::requireStatus('Active');
                        }
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
        ];
    }

    /**
     * Lists all Profile models.
     * @return mixed
     */
    public function actionIndex()
    {
    /**
        $searchModel = new ProfileSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
     */
        if($already_exists = RecordHelper::userHas('profile')) {
            return $this->render('view', ['model' => $this->findModel($already_exists)]);
        }else {
            return $this->redirect(['create']);
        }
    }

    /**
     * Displays a single Profile model.
     * @param integer $id
     * @return mixed
     */
    public function actionView()
    {
        if($already_exists = RecordHelper::userHas('profile')) {
            return $this->render('view', ['model' => $this->findModel($already_exists)]);
        }else {
            return $this->redirect(['create']);
        }
    }

    /**
     * Creates a new Profile model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Profile();
        $model->user_id = \Yii::$app->user->identity->id;
        
        if($already_exists = RecordHelper::userHas('profile')) {
            return $this->render('view', ['model' => $this->findModel($already_exists)]);
        } elseif ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view']);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);            
        }
    }

    /**
     * Updates an existing Profile model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate()
    {
        if ($model = Profile::find()->where(['user_id' => \Yii::$app->user->identity->id])->one()) {

            if ($model->load(Yii::$app->request->post()) && $model->save()) {
                return $this->redirect(['view']);
            } else {
                return $this->render('update', [
                'model' => $model,
                ]);
            }
        }else {
            throw new NotFoundHttpException('No Such Profile.');
        }
    }

    /**
     * Deletes an existing Profile model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete()
    {
        $model = Profile::find()->where(['user_id' => \Yii::$app->user->identity->id])->one();
        $this->findModel($model->id)->delete();

        return $this->redirect(['site/index']);
    }

    /**
     * Finds the Profile model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Profile the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Profile::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
