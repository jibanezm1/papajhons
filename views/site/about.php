<?php

use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

<script>
    function initMap() {


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
            zoom: 10,
            center: uluru,
        });








    }
</script>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<style>
    .yellow.darken-3 {
        background-color: #007954 !important;
    }
</style>
<div class="container-fluid">
    <div class="row">
        <div class="col m2">
            <?php
            echo '<label class="control-label">Provinces</label>';
            echo Select2::widget([
                'name' => 'state_10',
                'data' => ArrayHelper::map(app\models\Locales::find()->all(), 'id', 'name'),
                'options' => [
                    'placeholder' => 'Select provinces ...',
                ],
                'pluginEvents' => [
                    "change" => 'function(data) { 
                      reload(this.value);
                    }',
                ]
            ]);
            ?>
            <br>
            <div class="dashboard">
                <div class="row">
                    <div class="col  s12">
                        <div class="card yellow darken-3 white-text valign-wrapper">

                            <div class="card-content">
                                <div class="row">
                                    <h3 id="tiempo" class="card-stats-number">-</h3>
                                    <p>Tiempo Promedio</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col  s12">
                        <div class="card yellow darken-3 white-text valign-wrapper">

                            <div class="card-content">
                                <div class="row">
                                    <h3 id="distancia" class="card-stats-number">-</h3>
                                    <p>Distancia Promedio</p>
                                </div>
                            </div>
                        </div>
                    </div>


                </div>
            </div>
            <div class="table table-responsive" id="tabla"></div>
        </div>
        <div class="col s12 m6">
            <div id="map"></div>
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

    .dashboard {
        padding: 20px 15px;
        width: 85%;
        margin: auto;
    }

    @media (max-width: 1280px) {
        .dashboard {
            width: 100%;
        }
    }

    .dashboard .card {
        cursor: pointer
    }

    .dashboard .card .row {
        margin-bottom: 0;
    }

    .dashboard .card-stats-number {
        margin: 0;
        font-weight: bold;
    }

    .dashboard .icon {
        height: 140px;
    }

    .dashboard .icon {
        width: 100px;
    }

    .dashboard .icon i {
        width: 100%;
        text-align: center;
        color: rgba(0, 0, 0, .25)
    }
</style>
<script>
    function reload(id) {
        var settings = {
            "url": "../locales/data?id=" + id,
            "method": "GET",
            "timeout": 0,
            "headers": {
                "Cookie": "PHPSESSID=cpfc2v0uq0eeps0kpmdqa6eful; _csrf=a7e78395209096d7cbb1f94a2c0355ea15de4d86078c5bd00d53d26bb9ba9d1da%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22LcURD9HdvMiJyB-7AdPWyvHypReOmFcJ%22%3B%7D"
            },
        };

        $.ajax(settings).done(function(response) {

            var data = JSON.parse(response);


            var locations = data;
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



                if (i != 0) {


                    markers = new google.maps.Marker({
                        position: new google.maps.LatLng(position[1], position[2]),
                        map: map,

                    });


                    markers.addListener('click', function() {
                        console.log(this);
                        infowindow.setContent('<div>' +
                            '<h5>' + position[4][0] + '</h5>' +
                            '<p>' + position[4][1] + '</p>' +
                            '<p>Local: ' + position[4][6] + '</p>' +
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
                                    query: position[1] + ", " + position[2],
                                },
                                destination: {
                                    query: locations[0].text_address,
                                },
                                travelMode: google.maps.TravelMode.DRIVING,
                            })
                            .then((response) => {
                                directionsRenderer.setDirections(response);
                                document.getElementById('distancia' + i).innerHTML = response.routes[0].legs[0].distance.text;
                                document.getElementById('tiempo' + i).innerHTML = response.routes[0].legs[0].duration.text;

                            })
                            .catch((e) => window.alert("Directions request failed due to " + status));
                    });

                    return markers;
                } else {

                    markers = new google.maps.Marker({
                        position: new google.maps.LatLng(locations[0].latitude, locations[0].longitude),
                        map: map,
                        icon: "https://www.papajohns.cl/icons/favicon.ico"
                    });
                    console.log(locations[0])
                    document.getElementById("tiempo").innerHTML = locations[0][0];
                    document.getElementById("distancia").innerHTML = locations[0][1];

                    // aqui se renderiza la tabla

                    var settings = {
                        "url": "../locales/top?id=" + id,
                        "method": "GET",
                        "timeout": 0,
                        "headers": {
                            "Cookie": "PHPSESSID=cpfc2v0uq0eeps0kpmdqa6eful; _csrf=a7e78395209096d7cbb1f94a2c0355ea15de4d86078c5bd00d53d26bb9ba9d1da%3A2%3A%7Bi%3A0%3Bs%3A5%3A%22_csrf%22%3Bi%3A1%3Bs%3A32%3A%22LcURD9HdvMiJyB-7AdPWyvHypReOmFcJ%22%3B%7D"
                        },
                    };

                    $.ajax(settings).done(function(response) {
                        document.getElementById("tabla").innerHTML = response;
                    });




                    var circle = new google.maps.Circle({
                        map: map,
                        center: new google.maps.LatLng(locations[0].latitude, locations[0].longitude),
                        radius: 1500,
                        strokeColor: "#3fae7f",
                        fillColor: "#3fae7f"
                    });
                    return markers;
                }



            });


            directionsRenderer.setMap(map);








        });
    }
</script>