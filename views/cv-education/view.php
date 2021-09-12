<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Education */

$this->title = $model->cv_id;
$parantModalAttribute = $model->getCv()->one()->attributes;

$this->params['breadcrumbs'][] = ['label' => 'Cvs', 'url' => ['cv/index']];
$this->params['breadcrumbs'][] = ['label' => $parantModalAttribute['name'], 'url' => ['cv/view?id='.$model->cv_id]];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="cv-education-view">

    <h1><?= Html::encode("Education") ?></h1>

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

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cv_id',
            'educational_institution',
            'faculty',
            'field_of_study',
            'education_level',
            'status',
        ],
    ]) ?>

</div>
