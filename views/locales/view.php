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
                    '<p id="distancia'+i+'" >Distancia:' + position[4][5] + '</p>' +
                    '<p id="tiempo'+i+'">Tiempo:' + position[4][5] + '</p>' +
                    '<a href="../usuarios/view?id='+position[4][6]+' " class="waves-effect waves-light btn">Reasignar</a>' +

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
                        document.getElementById('distancia'+i).innerHTML = response.routes[0].legs[0].distance.text;
                        document.getElementById('tiempo'+i).innerHTML = response.routes[0].legs[0].duration.text;

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

    <h3><?= Html::encode($this->title) ?></h3>


    <!-- 
        
    estudiios de gestion de marcado autogestionados
    Plataforma panel 2000 personas responden encuestas a cambio de algo
    Kibernum -> Recluta permanentemente a ingenieros 
    no pueden mantener permanente con proyectos a los ingeniero.
    Estudiar Candormap


    -->
    <style>
        select#start {
            display: block;
        }

        select#end {
            display: block;
        }
    </style>
    <div class="row">
        <div class="s12">
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
    <div class=" row">
        <div class="col s12">

            <div id="map"></div>

        </div>


    </div>
    <div class="row">
        <div class="s12">
            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],

                    'cliente',
                    'direccion',
                    'comuna',
                    'region',
                    'km',
                    'tiempo',
                    //'lat',
                    //'lng',

                ],
            ]); ?>
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