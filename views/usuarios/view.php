<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var app\models\Usuarios $model */

$this->title = $model->cliente;
$this->params['breadcrumbs'][] = ['label' => 'Usuarios', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="usuarios-view">

    

    <p>
    <h5><?= Html::encode($this->title) ?></h5>  <?= Html::a('Actualizar datos usuario', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
       
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'cliente',
            'direccion',
            'comuna',
            'region',
            'telefono',
            'correo',
            'local.name'
            // 'lat',
            // 'lng',
        ],
    ]) ?>

</div>
