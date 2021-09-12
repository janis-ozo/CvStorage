<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Skils */

$this->title = 'Add Skills or Achievement';

(isset($_POST['cv_id'])? $cv_id = $_POST['cv_id']: $cv_id = "");
$parantModalAttribute = \app\models\Cv::find()->where(['id'=>$cv_id])->one()->attributes;
$parantModalId = $parantModalAttribute['id'];

$this->params['breadcrumbs'][] = ['label' => 'Cvs', 'url' => ['cv/index']];
$this->params['breadcrumbs'][] = ['label' => $parantModalAttribute['name'], 'url' => ['cv/view?id='.$parantModalAttribute['id']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cv-skils-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cv_id' => $cv_id,
    ]) ?>

</div>
