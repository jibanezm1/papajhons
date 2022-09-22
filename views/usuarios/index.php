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
            lat: -33.45694,
            lng: -70.64827
        };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoom: 10,
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


        <div class="col s12">


            <div id="map"></div>



        </div>


    </div>
    <div class="row">
        <div class="col s12">





            <?php


            // echo $this->render('_search', ['model' => $searchModel]); 
            ?>

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