<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\UsersSystems $model */

$this->title = 'Actualizar usuario de sistema: ' . $model->nombreUsuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios de Sistema', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
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
