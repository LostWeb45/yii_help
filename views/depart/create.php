<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Depart $model */

$this->title = 'Create Depart';
$this->params['breadcrumbs'][] = ['label' => 'Departs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="depart-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
