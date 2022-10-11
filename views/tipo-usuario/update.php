<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\TipoUsuario $model */

$this->title = 'Update Tipo Usuario: ' . $model->idTipo;
$this->params['breadcrumbs'][] = ['label' => 'Tipo Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->idTipo, 'url' => ['view', 'idTipo' => $model->idTipo]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="tipo-usuario-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
