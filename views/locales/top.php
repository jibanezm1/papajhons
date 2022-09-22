<?php


use yii\grid\GridView;
use yii\widgets\Pjax;

?>

<?php Pjax::begin() ?>

<?= GridView::widget([
    'dataProvider' => $dataProvider,
    'columns' => [
        ['class' => 'yii\grid\SerialColumn'],

        'cliente',
        'direccion',
        'comuna',
        [
            'label' => 'KM',
            'attribute' => 'km',
            // 'value' => 'km'
            'value' => function ($model) {
                $total = ($model->km) / 1000;
                return round($total);
            }
        ],
        [
            'label' => 'Tiempo',
            'value' => function ($model) {

                $horas = floor($model->tiempo / 3600);
                $minutos = floor(($model->tiempo - ($horas * 3600)) / 60);
                $segundos = $model->tiempo - ($horas * 3600) - ($minutos * 60);

                return $totales =  $horas . ':' . $minutos . ":" . round($segundos,2);
            }
        ],

    ],
]); ?>
<?php Pjax::end() ?>

<style>
    ul.pagination {
        display: none;
    }
</style>