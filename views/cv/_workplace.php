<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Workplace */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cv-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'workplace_name')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>



    <?php ActiveForm::end(); ?>

</div>
