<?php

use yii\data\ActiveDataProvider;
use yii\grid\GridView;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\widgets\DetailView;


/* @var $this yii\web\View */
/* @var $model app\models\Cv */

$this->title = $model->name;
if (!isset($_GET['preview'])) {
    $this->params['breadcrumbs'][] = ['label' => 'Cvs', 'url' => ['index']];
    $this->params['breadcrumbs'][] = $this->title;
}
\yii\web\YiiAsset::register($this);
?>
<div class="cv-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <?php
    if (!isset($_GET['preview'])) {
        ?>
        <p>

            <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Delete', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
            <?= Html::a('Preview', ['view', 'id' => $model->id, 'preview' => "on"], ['class' => 'btn btn-secondary']) ?>

        </p>

        <?php
    }
    ?>


    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            'surname',
            'phone',
            'email:email',
            'created_at',
            [
                'label' => "Address",
                'value' => ($model->getAddress()->count() > 0) ? $model->getAddress()->one()->getAddressString() : "",


            ],

        ],

    ]) ?>




    <?php
    if (!isset($_GET['preview'])) {


        if($model->getAddress()->count() > 0)
        {
            ?>
            <p>
                <?= Html::a("Edit Address",
                    Url::to(["address/update"]),
                    ['class' => 'btn btn-success', 'data-method' => 'GET', 'data-params' => ['id' => $model->id]]) ?>
            </p>
            <?php
        }else {
            ?>
            <p>
                <?= Html::a("Add Address",
                    Url::to(["address/create"]),
                    ['class' => 'btn btn-success', 'data-method' => 'POST', 'data-params' => ['cv_id' => $model->id]]) ?>
            </p>
            <?php
        }


    }
    ?>


    <?php

    $dataProvider = new ActiveDataProvider([
        'query' => \app\models\Workplace::find()->where(['cv_id' => $model->id]),
        'pagination' => [
            'pageSize' => 20,
        ],
    ]);


    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'workplace_name',
            'position',
            'work_experience',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {

                    if ($action === "view") {
                        return Url::to(['cv-workplace/view', 'id' => $key]);
                    }
                    if ($action === "update") {
                        return Url::to(['cv-workplace/update', 'id' => $key]);
                    }
                    if ($action === "delete") {
                        return Url::to(['cv-workplace/delete', 'id' => $key]);
                    }
                    return Url::previous();
                }],
        ],
    ]);

    ?>
    <?php
    if (!isset($_GET['preview'])) {
        ?>
        <p>
            <?= Html::a('Add Workplace',
                Url::to(['cv-workplace/create']),
                ['class' => 'btn btn-success', 'data-method' => 'POST', 'data-params' => ['cv_id' => $model->id]]) ?>
        </p>

        <?php
    }
    ?>



    <?php

    $dataProvider = new ActiveDataProvider([
        'query' => \app\models\Education::find()->where(['cv_id' => $model->id]),
        'pagination' => [
            'pageSize' => 3,
        ],
    ]);


    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'educational_institution',
            'field_of_study',
            'status',
            //'created_at',

            ['class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {

                    if ($action === "view") {
                        return Url::to(['cv-education/view', 'id' => $key]);
                    }
                    if ($action === "update") {
                        return Url::to(['cv-education/update', 'id' => $key]);
                    }
                    if ($action === "delete") {
                        return Url::to(['cv-education/delete', 'id' => $key]);
                    }
                    return Url::previous();
                }],
        ],
    ]);

    ?>
    <?php
    if (!isset($_GET['preview'])) {
        ?>
        <p>
            <?= Html::a('Add Education',
                Url::to(['cv-education/create']),
                ['class' => 'btn btn-success', 'data-method' => 'POST', 'data-params' => ['cv_id' => $model->id]]) ?>
        </p>

        <?php
    }
    ?>



    <?php

    $dataProvider = new ActiveDataProvider([
        'query' => \app\models\Skils::find()->where(['cv_id' => $model->id]),
        'pagination' => [
            'pageSize' => 3,
        ],
    ]);


    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'type',
            'description',

            //'created_at',

            ['class' => 'yii\grid\ActionColumn',
                'urlCreator' => function ($action, $model, $key, $index) {

                    if ($action === "view") {
                        return Url::to(['cv-skils/view', 'id' => $key]);
                    }
                    if ($action === "update") {
                        return Url::to(['cv-skils/update', 'id' => $key]);
                    }
                    if ($action === "delete") {
                        return Url::to(['cv-skils/delete', 'id' => $key]);
                    }
                    return Url::previous();
                }],
        ],
    ]);

    ?>
    <?php
    if (!isset($_GET['preview'])) {
        ?>
        <p>
            <?= Html::a('Add Skills Or Achievements',
                Url::to(['cv-skils/create']),
                ['class' => 'btn btn-success', 'data-method' => 'POST', 'data-params' => ['cv_id' => $model->id]]) ?>
        </p>

        <?php
    }
    ?>



    <?php

    if (isset($_GET['preview'])) {
        echo Html::a('Back', ['view', 'id' => $model->id], ['class' => 'btn btn-secondary']);
    }

    ?>
</div>

