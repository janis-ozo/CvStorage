<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Address */

$this->title = 'Update Address';
$parantModalAttribute = $model->getId0()->one()->attributes;
$this->params['breadcrumbs'][] = ['label' => 'Cvs', 'url' => ['cv/index']];
$this->params['breadcrumbs'][] = ['label' => $parantModalAttribute['name'], 'url' => ['cv/view?id='.$model->id]];
//$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="address-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cv_id'=>$model->id
    ]) ?>

</div>
