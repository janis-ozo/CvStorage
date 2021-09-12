<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Education */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cv-education-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cv_id')->textInput(['readonly'=>true, 'value'=>$cv_id])?>

    <?= $form->field($model, 'educational_institution')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'faculty')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'field_of_study')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'education_level')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
