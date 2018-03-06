<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\bootstrap\ActiveForm;

/* @var $this yii\web\View */
/* @var $searchModel app\models\AccountholderSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Accountholders';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accountholder-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <p>
        <?php echo $this->render('_search', ['model' => $searchModel]); ?>
    </p>
    
    <?php //    = Html::a('Create Accountholder', ['create'], ['class' => 'btn btn-success']) ?>
    
    <div class = "rol-lg-12">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        // 'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'name',
            'identity_card',
            'phone_no',
            //'country_code',
            //'date_of_birth',
            //'address',
            //'state',
            'city',
            //'country',
            //'postcode',
            //'race',
            //'signature',
            //'finger_print',
            //'user_name',
            //'password',
            //'last_logging_time',
            //'email:email',
            //'created_at',
            //'updated_at',
            //'is_deleted',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
    </div>
</div>
