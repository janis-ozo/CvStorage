<?php
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Workplace */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="cv-workplace-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'cv_id')->textInput(['readonly'=>true, 'value'=>$cv_id])?>

    <?= $form->field($model, 'workplace_name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'position')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'types_of_work_schedules')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'work_experience')->textInput(['maxlength' => true]) ?>



    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
