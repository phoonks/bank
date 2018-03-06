<?php

namespace app\controllers\api;

use Yii;
use yii\data\ActiveDataProvider;
use yii\helpers\ArrayHelper;
use yii\web\Controller;
use yii\web\Response;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;
use yii\filters\auth\QueryParamAuth;
use app\models\Accountholder;

class CrudController extends ApiController
{
    public function behaviors()
    {
        return ArrayHelper::merge(parent::behaviors(),[
            'authenticator'=> [
                'class' => QueryParamAuth::className(),
                'except' => ['call-api'],
                ]
            ]);
    }

    public function actionCallApi()
    {
        $model = Accountholder::find();
        $resp = [];

        foreach($model->each() as $m){
            $resp[$m->name."_test"] = $m->name;
        }

        return $resp;
    }
}