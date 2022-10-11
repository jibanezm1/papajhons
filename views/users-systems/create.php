<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UsersSystems $model */

$this->title = 'Agregar un nuevo usuario de sistema';
$this->params['breadcrumbs'][] = ['label' => 'Usuarios de sistema', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">
    <div class="panel-heading">
        <h1><?= Html::encode($this->title) ?></h1>

    </div>
    <div class="panel-body">
        <?= $this->render('_form', [
            'model' => $model,
        ]) ?>
    </div>


</div>
<style>
    .panel-heading {
        position: relative;
        height: 14vh!important;
        /* padding: 0; */
        color: #4d627b;
    }
</style>