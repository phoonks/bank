<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;
?>

<?php $form = ActiveForm::begin(); ?>
<?= $form->field($model, 'name')->textInput()
                    ->hint('Please enter your name')
                    ->label('Name'); ?>
<?= Html::submitButton('Search', ['class' => 'btn btn-primary']); ?>
<?php ActiveForm::end(); ?>



