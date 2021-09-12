<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Skils */

$this->title = 'Update Skills or Achievement: ' . $model->id;
$parantModalAttribute = $model->getCv()->one()->attributes;
$this->params['breadcrumbs'][] = ['label' => 'Cvs', 'url' => ['cv/index']];
$this->params['breadcrumbs'][] = ['label' => $parantModalAttribute['name'], 'url' => ['cv/view?id='.$model->cv_id]];
$this->params['breadcrumbs'][] = ['label' => "Skills or Achievement: ". $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="cv-skils-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cv_id'=> $model->cv_id
    ]) ?>

</div>
