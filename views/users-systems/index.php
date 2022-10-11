<?php

use app\models\UsersSystems;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\UsersSystemsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Usuarios de sistema';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="panel">
    <div class="panel-heading">
        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Añadir nuevo Usuario', ['create'], ['class' => 'btn btn-success']) ?>
        </p>
    </div>

    <div class="panel-body">
        <?= GridView::widget([
            'dataProvider' => $dataProvider,
            'filterModel' => $searchModel,
            'columns' => [
                ['class' => 'yii\grid\SerialColumn'],

                'id',
                'nombreUsuario:ntext',
                'correoUsuario:ntext',
                //'claveUsuario:ntext',
                'tipo.tipo',
                [
                    'class' => ActionColumn::className(),
                    'template' => '{update}{view}',
                    'urlCreator' => function ($action, UsersSystems $model, $key, $index, $column) {
                        return Url::toRoute([$action, 'id' => $model->id]);
                    }
                ],
            ],
        ]); ?>
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