<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Skils */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cv-skils-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cv_id')->textInput(['readonly'=>true, 'value'=>$cv_id])?>

    <?= $form->field($model, 'description')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
