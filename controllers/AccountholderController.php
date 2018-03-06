<?php

namespace app\controllers;

use Yii;
use app\models\Accountholder;
use app\models\AccountholderSearch;
use app\models\Country;
use app\models\City;
use app\forms\SignupForm;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\filters\AccessControl;

/**
 * AccountholderController implements the CRUD actions for Accountholder model.
 */
class AccountholderController extends Controller
{
    /**
     * {@inheritdoc}
     */
    public function behaviors()
    {
        $behaviors['access'] = [
            'class' => AccessControl::className(),
            'rules' => [
                [
                    'allow' => true,
                    'roles' => ['admin'],
                    'actions' => ['update', 'index', 'delete', 'view', 'create'],
                ],
                                [
                    'allow' => true,
                    'roles' => ['author'],
                    'actions' => ['index', 'view', 'create'],
                ]
            ],

        ];
        return $behaviors;
      // return [
      //       'verbs' => [
      //           'class' => VerbFilter::className(),
      //           'actions' => [
      //               'delete' => ['POST'],
      //           ],
      //       ],
      //   ];
    }

    /**
     * Lists all Accountholder models.
     * @return mixed
     */
    public function actionIndex()
    {
      if (Yii::$app->user->can('accountholder/index')) {  
        $searchModel = new AccountholderSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
            ]);
            }
            else {
              throw new ForbiddenHttpException; 
            }    
    }

    /**
     * Displays a single Accountholder model.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
            //'model' => $this->findModel(Yii::$app->user->id),
        ]);
    }

    /**
     * Creates a new Accountholder model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Accountholder();
        //$model = new SignupForm();
        
        if ($model->load(Yii::$app->request->post())) {
            //$model->createAccount();
            $model->save();
            Yii::$app->getSession()->setFlash('success', 'Create Account Holder Submmited Successfully');
            return $this->redirect(['view', 'id' => $model->id]);
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Accountholder model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);
        $db = Yii::$app->db->beginTransaction();
        if ($model->load(Yii::$app->request->post())) {
            try {
                if(!$model->save()){
                    throw new \Exception(current($model->getFirstErrors()));
                }
                $db->commit();    
            }catch(\Exception $e) {
                $db->rollback();
                echo $e->getMessage();
            }
            
            Yii::$app->getSession()->setFlash('success', 'Update Submmited Successfully');
            return $this->redirect(['view', 'id' => $model->id]);
        }
        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Accountholder model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($id)
    {
        $accountholder = Accountholder::findOne($id);
        $accountholder->is_deleted = 1;

        try {
            if(!$accountholder->update(false, ['is_deleted'])) {  // boolean
                throw new \Exception(current($model->getFirstErrors()));
            }
        }catch(\Exception $e) {
            echo $e->getMessage();
        }    
        Yii::$app->session()->setFlash('success', 'Delete Submmited Successfully');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Accountholder model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Accountholder the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Accountholder::findOne($id)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('The requested page does not exist.');
    }

    public function actionSearch()
    {
        $model = new Accountholder;

        if ($model->load(Yii::$app->request->post())) {

        }else {
            return $this->render('search', ['model'=>$model]);
        }
    }

    public function actionList_city($id)
    {
        $countcity = City::find()
            ->where(['country_id' => $id])
            ->count();
        $city = City::find()
            ->where(['country_id' => $id])
            ->orderBy('id DESC')
            ->all();
        if ($countcity > 0) {
            foreach($city as $result) 
                echo "<option value='".$result->id."'>".$result->name."</option>";
        }else {
            echo "<option>-</option>"; 
        }
    }
}
