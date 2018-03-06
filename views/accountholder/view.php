<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Accountholder */


/*      <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>*/

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Accountholders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accountholder-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>        
    </p>

    <?php if (Yii::$app->session->hasFlash('success')): ?>

    <?php else: ?>

    <?php endif; ?>
    
    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'identity_card',
            'last_name',
            'first_name',
            'name',
            'phone_no',
            'country_code',
            'date_of_birth',
            'address',
            'state',
            'city',
            'country',
            'postcode',
            'race',
            'user_name',
            'password',
            'email:email',
        ],
    ]) ?>

</div>
