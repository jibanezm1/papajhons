<?php

use app\models\Usuarios;
use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\Locales $model */

$this->title = "Local: " . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Locales', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
$data = json_decode($mapa);
\yii\web\YiiAsset::register($this);
?>
<script src="https://cdnjs.cloudflare.com/ajax/libs/js-marker-clusterer/1.0.0/markerclusterer_compiled.js" async></script>

<script>
    function initMap() {
        const directionsService = new google.maps.DirectionsService();
        const directionsRenderer = new google.maps.DirectionsRenderer();
        var infowindow = new google.maps.InfoWindow({
            maxWidth: 300,

        });
        const map = new google.maps.Map(document.getElementById("map"), {
            zoom: 12,
            center: {
                lat: <?php echo $model->latitude; ?>,
                lng: <?php echo $model->longitude; ?>
            },
        });
        var markers, i;
        var locations = <?php echo $mapa; ?>;
        var locales = <?php echo $locales; ?>;

        markers = new google.maps.Marker({
            position: new google.maps.LatLng(<?php echo $model->latitude; ?>, <?php echo $model->longitude; ?>),
            map: map,
            icon: "https://www.papajohns.cl/icons/favicon.ico"
        });

        const news = locations.map((position, i) => {
            var newMarker = new google.maps.Marker({
                title: position[3],
                position: new google.maps.LatLng(position[1], position[2]),
                map: map,
                data: position[4],
                icon: "../images/man.png"
            });
            newMarker.addListener('click', function() {
                infowindow.setContent('<div>' +
                    '<h5>' + position[4][0] + '</h5>' +
                    '<p>' + position[4][1] + '</p>' +
                    '<p>Local: <?php echo $model->name; ?></p>' +
                    '<p>Tel:' + position[4][4] + '</p>' +
                    '<p>Mail:' + position[4][5] + '</p>' +
                    '<p id="distancia' + i + '" >Distancia:' + position[4][5] + '</p>' +
                    '<p id="tiempo' + i + '">Tiempo:' + position[4][5] + '</p>' +
                    '<a href="../usuarios/view?id=' + position[4][6] + ' " class="waves-effect waves-light btn">Reasignar</a>' +

                    '</div>');
                infowindow.open(map, this);

                directionsService
                    .route({
                        origin: {
                            query: this.title
                        },
                        destination: {
                            query: "<?php echo $model->text_address; ?>, <?php echo $model->commune; ?>, <?php echo $model->region; ?>",
                        },
                        travelMode: google.maps.TravelMode.TRANSIT,
                    })
                    .then((response) => {
                        directionsRenderer.setDirections(response);
                        document.getElementById('distancia' + i).innerHTML = response.routes[0].legs[0].distance.text;
                        document.getElementById('tiempo' + i).innerHTML = response.routes[0].legs[0].duration.text;

                    })
                    .catch((e) => window.alert("Directions request failed due to " + status));
            });
        })


        var circle = new google.maps.Circle({
            map: map,
            center: new google.maps.LatLng(<?php echo $model->latitude; ?>, <?php echo $model->longitude; ?>),
            radius: 4000,
            strokeColor: "#3fae7f",
            fillColor: "#3fae7f"
        })



        directionsRenderer.setMap(map);

        const otros = locales.map((position, i) => {
            var newMarkers = new google.maps.Marker({
                title: position[0],
                position: new google.maps.LatLng(position[1], position[2]),
                map: map,
                icon: "../images/iconono.png"
            });

            newMarkers.addListener('click', function() {
                infowindow.setContent('<div>' +
                    '<p>' + position[0] + '</p>' +

                    '</div>');
                infowindow.open(map, this);
            });

            return newMarkers;
        });

        console.log(otros);
        new MarkerClusterer({
            otros,
            map
        });
    }



    window.initMap = initMap;
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>


<div class="locales-view row">



    <!-- 
        
    estudiios de gestion de marcado autogestionados
    Plataforma panel 2000 personas responden encuestas a cambio de algo
    Kibernum -> Recluta permanentemente a ingenieros 
    no pueden mantener permanente con proyectos a los ingeniero.
    Estudiar Candormap


    -->
    <style>
        .panel-heading {
            height: 60px !important;
        }

        select#start {
            display: block;
        }

        select#end {
            display: block;
        }
    </style>
    <div class="panel">
        <div class="panel-heading">
            <h3 class="panel-title">Evolucion del promedio de tiempo de translado del local</h3>
        </div>
        <div class="panel-body">
            <div class="pad-all">
                <div id="demo-morris-line-legend" class="text-center"></div>
                <div id="demo-morris-line" style="height:268px"></div>
            </div>
            <br><br><br><br>
            <div class="row">
                <div class="col-md-4">
                    <div class="panel panel-warning panel-colorful media middle pad-all">
                        <div class="media-left">
                            <div class="pad-hor">
                                <i class="demo-pli-clock icon-3x"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no text-semibold">25 Min</p>
                            <p class="mar-no">Tiempo Promedio</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-info panel-colorful media middle pad-all">
                        <div class="media-left">
                            <div class="pad-hor">
                                <i class="demo-pli-map icon-3x"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no text-semibold">7 KM</p>
                            <p class="mar-no">Distancia Promedio</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="panel panel-mint panel-colorful media middle pad-all">
                        <div class="media-left">
                            <div class="pad-hor">
                                <i class="demo-pli-check icon-3x"></i>
                            </div>
                        </div>
                        <div class="media-body">
                            <p class="text-2x mar-no text-semibold">Publico</p>
                            <p class="mar-no">Medio de transporte preferido</p>
                        </div>
                    </div>
                </div>
               
                

            </div>
        </div>

    </div>
    <div class="panel">
        <div class="panel-heading">
            <h3><?= Html::encode($this->title) ?></h3>

        </div>
        <div class="panel-body">
            <div class="col-md-12">
                <?= DetailView::widget([
                    'model' => $model,
                    'attributes' => [
                        'name:ntext',
                        'text_address:ntext',
                        'phone:ntext',
                        'commune:ntext',
                        'region:ntext',
                        [
                            'label' => 'Cantidad Trabajadores',
                            'value' => function ($model) {
                                $cantidad = Usuarios::find()->where(["idLocal" => $model->id])->count('*');
                                return $cantidad;
                            }
                        ]
                    ],
                ]) ?>
            </div>
        </div>
    </div>
    <div class="panel">
        <div class="panel-heading">
            <h3>Mapa</h3>
            <br> <br> <br>
        </div>
        <div class="panel-body">


            <div id="map"></div>


        </div>
    </div>

    <div class=" ">

        <div class="panel">
            <div class="panel-heading">
                <h3>Listado de colaboradores del local</h3>
                <br> <br> <br>
            </div>
            <div class="panel-body">
                <div class="col-md-12">
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
                            //'lat',
                            //'lng',

                        ],
                    ]); ?>
                </div>
            </div>
        </div>
    </div>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAQbmLRDXnmodAxAj-KiDRbbZPHT8oil_E&callback=initMap&v=weekly" async></script>


    <style>
        #map {
            height: calc((120vh - 110px) - 30vh);
            /* The height is 400 pixels */
            width: 100%;
            /* The width is the width of the web page */
        }

        td {
            font-size: 11px;
            padding: 3px;
        }
    </style>
    <script src="../nifty/plugins/morris-js/morris.min.js"></script>
    <script src="../nifty/plugins/morris-js/raphael-js/raphael.min.js"></script>
    <script src="../nifty/js/demo/nifty-demo.min.js"></script>

    <!--Custom script [ DEMONSTRATION ]-->
    <!--===================================================-->
    <script>
        $(document).ready(function() {

            console.log("hola");
            // MORRIS LINE CHART
            // =================================================================
            // Require MorrisJS Chart
            // -----------------------------------------------------------------
            // http://morrisjs.github.io/morris.js/
            // =================================================================
            var day_data = [{
                    'elapsed': '20/01/2022',
                    'value': 18
                },
                {
                    'elapsed': '20/01/2022',
                    'value': 24
                },
                {
                    'elapsed': '20/01/2022',
                    'value': 9
                },
                {
                    'elapsed': '20/01/2022',
                    'value': 12
                },
                {
                    'elapsed': '20/01/2022',
                    'value': 13
                },
                {
                    'elapsed': '20/01/2022',
                    'value': 22
                },

            ];
            Morris.Line({
                element: 'demo-morris-line',
                data: day_data,
                xkey: 'elapsed',
                ykeys: ['value'],
                labels: ['value'],
                gridEnabled: true,
                gridLineColor: 'rgba(0,0,0,.1)',
                gridTextColor: '#8f9ea6',
                gridTextSize: '11px',
                lineColors: ['#177bbb'],
                lineWidth: 2,
                parseTime: false,
                resize: true,
                hideHover: 'auto'
            });

        });
    </script>