<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Depart $model */

$this->title = 'Update Depart: ' . $model->Name;
$this->params['breadcrumbs'][] = ['label' => 'Departs', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->Name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="depart-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
