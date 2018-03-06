<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Accountholder */

$this->title = 'Create Accountholder';
$this->params['breadcrumbs'][] = ['label' => 'Accountholders', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="accountholder-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
