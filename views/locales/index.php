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
        // The location of Uluru
        const uluru = {
            lat: -33.45694,
            lng: -70.64827
        };
        // The map, centered at Uluru
        const map = new google.maps.Map(document.getElementById("map"), {
            mapTypeId: google.maps.MapTypeId.ROADMAP,
            zoom: 12,
            center: uluru,
        });

        // The marker, positioned at Uluru
        const marker = new google.maps.Marker({
            position: uluru,
            map: map,
        });
        var infowindow = new google.maps.InfoWindow;

        var markers, i;

        for (i = 0; i < locations.length; i++) {
            markers = new google.maps.Marker({
                position: new google.maps.LatLng(locations[i][1], locations[i][2]),
                map: map,
                icon: "https://www.papajohns.cl/icons/favicon.ico"
            });
            var circle = new google.maps.Circle({
                map: map,
                center: new google.maps.LatLng(locations[i][1], locations[i][2]),
                radius: 1500,
                strokeColor: "#3fae7f",
                fillColor: "#3fae7f"
            })
        }


        // var circle = new google.maps.Circle({
        //     map:map,
        //     center: new google.maps.LatLng(-33.45694, -70.64827),
        //     radius:1000,
        //     strokeColor:"#3fae7f",
        //     fillColor:"#3fae7f"
        // })

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

            <?= GridView::widget([
                'dataProvider' => $dataProvider,
                'filterModel' => $searchModel,
                'columns' => [
                    ['class' => 'yii\grid\SerialColumn'],
                    'name:ntext',
                    'text_address:ntext',
                    //'latitude:ntext',
                    //'longitude:ntext',
                    'phone:ntext',
                    'commune:ntext',
                    'region:ntext',
                    [
                        'label' => 'Acciones',
                        'format' => 'raw',
                        'value' => function ($model) {
                            return Html::a('Ver', ['/locales/view', 'id' => $model->id], ['class' => 'btn btn-primary']);
                        }
                    ]


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