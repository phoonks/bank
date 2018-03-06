<?php

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\AccountholderSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accountholder-search" class = "rol-lg-4">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'layout' => 'inline'
    ]); ?>
    <div class = "col-lg-2">
	    <?= $form->field($model, 'id')->textInput(['placeholder' => 'Enter ID to search']) ?>
    </div>
	<div class = "col-lg-2">
	    <?= $form->field($model, 'name')->textInput(['placeholder' => 'Enter name to search']) ?>
	</div>
	<div class = "col-lg-2">
	    <?= $form->field($model, 'identity_card')->textInput(['placeholder' => 'Enter IC to search']) ?>
	</div>
	<div class = "col-lg-2">
	    <?= $form->field($model, 'phone_no')->textInput(['placeholder' => 'Enter phone no to search']) ?>
    </div>
	<div class = "col-lg-2">
	    <?= $form->field($model, 'city')->textInput(['placeholder' => 'Enter city to search']) ?>
	</div>
	<div class = "col-lg-2">
	    <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
	</div>
	<?php ActiveForm::end(); ?>
</div>

