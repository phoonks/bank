<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use app\models\Country;
use app\models\City;
use dosamigos\datepicker\DatePicker;
/* @var $this yii\web\View */
/* @var $model app\models\Accountholder */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="accountholder-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class  = "col-lg-12">
        <?= $form->field($model, 'identity_card')->textInput(['placeholder' => 'Please enter IC'], ['maxlength' => true]) ?>
    </div>

    <div class  = "col-lg-6">
        <?= $form->field($model, 'last_name')->textInput(['placeholder' => 'Please enter last name'], ['maxlength' => true]) ?>
    </div>

    <div class  = "col-lg-6">
        <?= $form->field($model, 'first_name')->textInput(['placeholder' => 'Please enter first name'], ['maxlength' => true]) ?>
    </div>

    <div class  = "col-lg-12">
        <?= $form->field($model, 'name')->textInput(['placeholder' => 'Please enter name'], ['maxlength' => true]) ?>
    </div>

    <div class  = "col-lg-12">
        <?= $form->field($model, 'email')->textInput(['placeholder' => 'Please enter email'], ['maxlength' => true]) ?>
    </div>

    <div class  = "col-lg-4">
        <?= $form->field($model, 'country_code')->textInput(['maxlength' => true]) ?>
    </div>

    <div class  = "col-lg-8">
        <?= $form->field($model, 'phone_no')->textInput(['placeholder' => 'Please enter phone number'], ['maxlength' => true]) ?>
    </div>

    <div class  = "col-lg-12">
        <?= $form->field($model, 'date_of_birth')->widget(
            DatePicker::className(), [
            // inline too, not bad
             'inline' => true, 
             // modify template for custom rendering
            'template' => '<div class="well well-sm" style="background-color: #fff; width:250px">{input}</div>',
            'clientOptions' => [
                'autoclose' => true,
                'format' => 'dd-M-yyyy'
            ]
        ]);?>
    </div>

    <div class  = "col-lg-12">
        <?= $form->field($model, 'address')->textInput(['placeholder' => 'Please enter address'], ['maxlength' => true]) ?>
    </div>

    <div class  = "col-lg-3">
        <?= $form->field($model, 'country')->dropDownList(
            Country::dropdown(),['prompt' => 'Select Country', 
            'onchage' => '
                $.post( "'.Yii::$app->urlManager->createUrl('accountholder/list_city?id=').'"+$(this).val(), function( data ) {
                        $( "select#city").html( data );
                    });']
            ) ?>
    </div>

    <div class  = "col-lg-3">
        <?= $form->field($model, 'city')->dropDownList(
            City::dropdown(),['prompt' => 'Select City', 'id' => 'city']
            ) ?>
    </div>

    <div class  = "col-lg-3">
        <?= $form->field($model, 'state')->textInput(['maxlength' => true]) ?>
    </div>

    <div class  = "col-lg-3">
        <?= $form->field($model, 'postcode')->textInput() ?>
    </div>

    <div class  = "col-lg-12">
        <?= $form->field($model, 'race')->textInput(['maxlength' => true]) ?>
    </div>

    <div class  = "col-lg-12">
        <?= $form->field($model, 'user_name')->textInput(['placeholder' => 'Please enter user name'], ['maxlength' => true]) ?>
    </div>

    <div class  = "col-lg-12">
        <?= $form->field($model, 'password')->passwordInput(['placeholder' => 'Please enter password'], ['maxlength' => true]) ?>
    </div>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
