<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\UsersSystems $model */

$this->title = $model->nombreUsuario;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios de sistema', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>

<div class="panel">
    <div class="panel-heading">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Actualizar', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>

        </p>
    </div>
    <div class="panel-body">

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                'id',
                'nombreUsuario:ntext',
                'correoUsuario:ntext',
                'claveUsuario:ntext',
                'idTipo',
            ],
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