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
                'except' => ['view-api', 'detail-api', 'signup-api', 'update-api'],
                ]
            ]);
    }

    public function actionSignupApi($m)
    {
        $db = Yii::$app->db->beginTransaction();
        $model = new AccountHolder;

        try {
            $model->identity_card = $m->identity_card;
            $model->last_name = $m->last_name;
            $model->first_name = $m->first_name;
            $model->name = $m->name;
            $model->phone_no = $m->phone_no;
            $model->country_code = $m->country_code;
            $model->date_of_birth = $m->date_of_birth;
            $model->address = $m->address;
            $model->state = $m->state;
            $model->city = $m->city;
            $model->country = $m->country;
            $model->postcode = $m->postcode;
            $model->race = $m->race;
            $model->signature = $m->signature;
            $model->finger_print = $m->finger_print;
            $model->user_name = $m->user_name;
            $model->password = $m->password;
            $model->email = $m->email;
            $model->last_logging_time = $this->date('Y-m-d H:i:s');
            $model->created_at = $this->date('Y-m-d H:i:s');
            $model->updated_at = $this->date('Y-m-d H:i:s');
            $model->is_deleted = 0;
            
            $db->commit();
            $model->save();
            return True;     
        }catch(\Exception $e) {
                $db->rollback();
                return $e->getMessage();
        }
        
    }

    public function actionUpdateApi($m)
    {
        $db = Yii::$app->db->beginTransaction();
        $model = new AccountHolder;

        try {   
                $model->identity_card = $m->identity_card;
                $model->last_name = $m->last_name;
                $model->first_name = $m->first_name;
                $model->name = $m->name;
                $model->phone_no = $m->phone_no;
                $model->country_code = $m->country_code;
                $model->date_of_birth = $m->date_of_birth;
                $model->address = $m->address;
                $model->state = $m->state;
                $model->city = $m->city;
                $model->country = $m->country;
                $model->postcode = $m->postcode;
                $model->race = $m->race;
                $model->email = $m->email;
                
                $db->commit();
                $model->save();
                return True;    
            }catch(\Exception $e) {
                $db->rollback();
                return $e->getMessage();
            }
    }

    public function actionViewApi()
    {
        $model = Accountholder::find();
        $resp = [];
        $detail = [];

        foreach($model->each() as $m) {
            //$resp[$m->id."_test"] = $m->id;
            $detail["ID"] = $m->id;
            $detail["Name"] = $m->name;
            $detail["IC"] = $m->identity_card;
            $detail["City"] = $m->city;
            $resp[$m->id] = $detail;
        }
        return $resp;
    }

    public function actionDetailApi($id)
    {
        $model = Accountholder::findOne($id);
        $resp = [];
        $detail = [];

        $resp["ID"] = $model->id;
        $resp["Last Name"] = $model->last_name;
        $resp["First Name"] = $model->first_name;
        $resp["Name"] = $model->name;
        $resp["Phone No"] = $model->phone_no;
        $resp["Country Code"] = $model->country_code;
        $resp["Date Of Birth"] = $model->date_of_birth;
        $resp["Address"] = $model->address;
        $resp["City"] = $model->city;
        $resp["Country"] = $model->country;
        $resp["Postcode"] = $model->postcode;
        $resp["Race"] = $model->race;
        $resp["Email"] = $model->email;

        return $resp;
    }


}