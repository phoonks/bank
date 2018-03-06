$db = Yii::$app->db->beginTransaction();
try{
	if(!$model->save()){
		throw new \Exception("123");
	}

	$db->commit();

	return true;
}catch(\Exception $e)
{
	$db->rollback();
	echo $e->getMessage();
}


Yii::$app->user->can('accountholder/update')

'visbile' => true / false (Yii::$app->user->can('accountholder/update'))