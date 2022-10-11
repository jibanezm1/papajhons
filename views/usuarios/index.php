<?php

use app\models\Usuarios;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;

/** @var yii\web\View $this */
/** @var app\models\UsuariosSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Usuarios';
$this->params['breadcrumbs'][] = $this->title;
?>


<script>
    function initMap() {

        var locations = <?php echo $mapa; ?>;
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();
        var infowindow = new google.maps.InfoWindow({
            maxWidth: 300,

        });
        // The location of Uluru
        const uluru = {
            lat: parseFloat(locations[0][1]),
            lng: parseFloat(locations[0][2])
        };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoom: 8,
            center: uluru,
        });


        var infowindow = new google.maps.InfoWindow;

        var markers, i;
        const otros = locations.map((position, i) => {

            markers = new google.maps.Marker({
                position: new google.maps.LatLng(position[1], position[2]),
                map: map
            });
            markers.addListener('click', function() {
                infowindow.setContent('<div>' +
                    '<h5>' + position[3][0] + '</h5>' +
                    '<p>' + position[3][1] + '</p>' +
                    '<p>Local: ' + position[3][6] + '</p>' +
                    '<p>Tel:' + position[3][4] + '</p>' +
                    '<p>Mail:' + position[3][5] + '</p>' +
                    '</div>');
                infowindow.open(map, this);

                directionsService
                    .route({
                        origin: {
                            query: position[3][1] + ", " + position[3][2],
                        },
                        destination: {
                            query: position[3][7] + ", " + position[3][8],
                        },
                        travelMode: google.maps.TravelMode.TRANSIT,
                    })
                    .then((response) => {
                        directionsRenderer.setDirections(response);

                    })
                    .catch((e) => window.alert("Directions request failed due to " + status));
            });

            return markers;


        });
        // for (i = 0; i < locations.length; i++) {
        directionsRenderer.setMap(map);


        // }


        // var markerCluster = new MarkerClusterer(map, markers, {
        //     imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'
        // });





    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>



<div class="usuarios-index">


    <div class="row">


        <div class="col-md-12">

            <div class="panel">
                <div class="panel-heading">
                    <h4>Colaboradores</h4>
                </div>
                <div class="panel-body">
                <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

                    <div id="map"></div>

                </div>
            </div>

        </div>


    </div>
    <div class="row">
        <div class="panel">
            <div class="panel-heading">
                <h4>Indicadores</h4>
            </div>
            <div class="panel-body">
                <div class="row">
                    <div class="col-sm-6 col-lg-8">
                        <div class="row">
                            <br>
                            <div class="col-sm-6">

                                <!--Tile-->
                                <!--===================================================-->
                                <div class="panel panel-primary panel-colorful">
                                    <div class="pad-all text-center">
                                        <span class="text-3x text-thin"><?php echo $totales; ?> min</span>
                                        <p>Tiempo Promedio</p>
                                        <i class="demo-pli-user icon-lg"></i>
                                    </div>
                                </div>
                                <!--===================================================-->


                                <!--Tile-->
                                <!--===================================================-->
                                <div class="panel panel-warning panel-colorful">
                                    <div class="pad-all text-center">
                                        <span class="text-3x text-thin"><?php echo $totalUsuarios; ?></span>
                                        <p>Colaboradores</p>
                                        <i class="demo-psi-user icon-lg"></i>
                                    </div>
                                </div>
                                <!--===================================================-->

                            </div>
                            <div class="col-sm-6">

                                <!--Tile-->
                                <!--===================================================-->
                                <div class="panel panel-purple panel-colorful">
                                    <div class="pad-all text-center">
                                        <span class="text-3x text-thin"><?php echo round($promediokm); ?> KM</span>
                                        <p>Distancia Promedio</p>
                                        <i class="demo-pli-user"></i>
                                    </div>
                                </div>
                                <!--===================================================-->


                                <!--Tile-->
                                <!--===================================================-->
                                <div class="panel panel-danger panel-colorful">
                                    <div class="pad-all text-center">
                                        <span class="text-3x text-thin"><?php echo $rango3; ?></span>
                                        <p>Fuera de Rango</p>
                                        <i class="demo-psi-user icon-lg"></i>
                                    </div>
                                </div>
                                <!--===================================================-->

                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-4">
                        <div class="row">
                            <div class="col-md-12">
                                <!--Tile-->
                                <!--===================================================-->
                                <div class="panel media pad-all bg-success">
                                    <div class="media-left">
                                        <span class="icon-wra icon-wap-sm bg-ifo">
                                            <i class="demo-pli-check icon-3x"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-semibold"><?php echo $rango1; ?></p>
                                        <p class="mar-no">Rango Optimo</p>
                                    </div>
                                </div>
                                <!--===================================================-->
                                <!--Tile-->
                                <!--===================================================-->
                                <div class="panel media pad-all bg-warning">
                                    <div class="media-left">
                                        <span class="icon-wra icon-wap-sm bg-warning">
                                            <i class="demo-pli-like icon-3x"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-semibold"><?php echo $rango2; ?></p>
                                        <p class="mar-no">Rango aceptable</p>
                                    </div>
                                </div>
                                <!--===================================================-->


                                <!--Tile-->
                                <!--===================================================-->
                                <div class="panel media pad-all bg-danger">
                                    <div class="media-left">
                                        <span class="icon-wra icon-wap-sm bg-danger">
                                            <i class="demo-pli-close icon-3x"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p class="text-2x mar-no text-semibold"><?php echo $rango3; ?></p>
                                        <p class="mar-no">Fuera de Rango</p>
                                    </div>
                                </div>
                                <!--===================================================-->

                            </div>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">





            <div class="panel">
                <div class="panel-heading">
                    <h4>Listado de Colaboradores</h4>
                </div>
                <div class="panel-body">

                    <?= GridView::widget([
                        'dataProvider' => $dataProvider,
                        'filterModel' => $searchModel,
                        'columns' => [
                            ['class' => 'yii\grid\SerialColumn'],

                            'cliente',
                            'direccion',
                            'comuna',
                            'region',
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

                                    return $totales =  $horas . ':' . $minutos . ":" . round($segundos, 2);
                                }
                            ],
                            [
                                'attribute' => 'idLocal',
                                'value' => 'local.name'
                            ],
                            //'correo',
                            //'lat',
                            //'lng',

                        ],
                    ]); ?>
                </div>
            </div>


        </div>
    </div>


</div>
<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQbmLRDXnmodAxAj-KiDRbbZPHT8oil_E&callback=initMap&v=weekly" async></script>

<style>
    #map {
        height: calc((120vh - 110px) - 50vh);
        /* The height is 400 pixels */
        width: 100%;
        /* The width is the width of the web page */
    }

    td {
        font-size: 11px;
        padding: 3px;
    }
</style>