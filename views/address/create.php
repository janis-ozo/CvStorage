<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Address */

(isset($_POST['cv_id'])? $cv_id = $_POST['cv_id']: $cv_id = "");
$parantModalAttribute = \app\models\Cv::find()->where(['id'=>$cv_id])->one()->attributes;
$parantModalId = $parantModalAttribute['id'];

$this->title = 'Create Address';
$this->params['breadcrumbs'][] = ['label' => 'Addresses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="address-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'cv_id' => $parantModalId
    ]) ?>

</div>
