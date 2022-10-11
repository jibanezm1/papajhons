<?php

use app\models\Usuarios;
use kartik\select2\Select2;
use yii\helpers\ArrayHelper;

/** @var yii\web\View $this */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>

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
            zoom: 4,
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

<div class="container-fluid">
    <div class="row">
        <div class="col-sm-6">
            <div class="panel">
                <div style="    height: 5vh !important;" class="panel-heading">
                    <h4>Acciones</h4>
                </div>
                <div class="panel-body">
                    <?php
                    echo '<label class="control-label">Locales</label>';
                    echo Select2::widget([
                        'name' => 'state_10',
                        'data' => ArrayHelper::map(app\models\Locales::find()->all(), 'id', function ($model) {

                            $cantidad = Usuarios::find()->where(["idLocal" => $model->id])->count('*');


                            return $model->name . " (" . $model->region . " -- " . $model->commune . ") " . "(" . $cantidad . ")";
                        }),
                        'options' => [
                            'placeholder' => 'Seleccione Locales ...',
                        ],
                        'pluginEvents' => [
                            "change" => 'function(data) { 
                      reload(this.value);
                    }',
                        ]
                    ]);
                    ?>
                    <br>
                    <div class="">
                        <div class="row-fluid">
                            <div class="col-md-6">
                                <div class="panel media pad-all bg-info">
                                    <div class="media-left">
                                        <span class="icon-wra icon-wap-sm bg-ifo">
                                            <i class="demo-pli-like icon-3x"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p id="tiempo" class="text-2x mar-no text-semibold"><?php echo $tiempo; ?></p>
                                        <p class="mar-no">Tiempo</p> hrs.
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel media pad-all bg-info">
                                    <div class="media-left">
                                        <span class="icon-wra icon-wap-sm bg-ifo">
                                            <i class="demo-pli-male icon-3x"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p id="distancia" class="text-2x mar-no text-semibold"><?php echo round($distancia, 2); ?></p>
                                        <p class="mar-no">Distancia</p> Km.
                                    </div>
                                </div>

                            </div>
                            <div class="col-md-6">
                                <div class="panel media pad-all bg-info">
                                    <div class="media-left">
                                        <span class="icon-wra icon-wap-sm bg-ifo">
                                            <i class="demo-pli-male icon-3x"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p id="usuarios" class="text-2x mar-no text-semibold"><?php echo $usuarios; ?></p>
                                        <p class="mar-no">Colaboradores</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="panel media pad-all bg-info">
                                    <div class="media-left">
                                        <span class="icon-wra icon-wap-sm bg-ifo">
                                            <i class="demo-pli-home icon-3x"></i>
                                        </span>
                                    </div>
                                    <div class="media-body">
                                        <p id="locales" class="text-2x mar-no text-semibold"><?php echo $locales; ?></p>
                                        <p class="mar-no">Locales</p>
                                    </div>
                                </div>

                            </div>






                        </div>
                        <div class="row">
                            <div class="col-sm-6 col-lg-12">
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
                                                <p id="rango1" class="text-2x mar-no text-semibold"><?php echo $rango1; ?></p>
                                                <p class="mar-no">Rango Óptimo</p>
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
                                                <p id="rango2" class="text-2x mar-no text-semibold"><?php echo $rango2; ?></p>
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
                                                <p id="rango3" class="text-2x mar-no text-semibold"><?php echo $rango3; ?></p>
                                                <p class="mar-no">Fuera de Rango</p>
                                            </div>
                                        </div>
                                        <!--===================================================-->

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="table table-responsive" id="tabla"></div>
                </div>
            </div>

        </div>
        <div class="col-sm-6">
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
                lat: data[0].latitude,
                lng: data[0].longitude
            };
            // The map, centered at Uluru
            const map = new google.maps.Map(document.getElementById("map"), {
                mapTypeId: google.maps.MapTypeId.ROADMAP,
                zoom: 12,
                center: new google.maps.LatLng(data[0].latitude, data[0].longitude),
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
                        console.log(position)
                        console.log(this);
                        infowindow.setContent('<div>' +
                            '<h5>' + position[4][0] + '</h5>' +
                            '<p>' + position[4][1] + '</p>' +
                            '<p>Local: ' + position[4][9] + '</p>' +
                            '<p>Tel:' + position[4][4] + '</p>' +
                            '<p>Mail:' + position[4][5] + '</p>' +
                            '<p id="distancia' + i + '" >Distancia:' + position[4][5] + ': Km.</p>' +
                            '<p id="tiempo' + i + '">Tiempo:' + position[4][5] + ': hrs.</p>' +
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
                    document.getElementById("tiempo").innerHTML = locations[0][0];
                    document.getElementById("distancia").innerHTML = locations[0][1];
                    document.getElementById("rango1").innerHTML = locations[0][3];
                    document.getElementById("rango2").innerHTML = locations[0][4];
                    document.getElementById("rango3").innerHTML = locations[0][5];
                    document.getElementById("usuarios").innerHTML = locations[0][6];
                    document.getElementById("locales").innerHTML = locations[0][7];

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
                        radius: 9000,
                        strokeColor: "#3fae7f",
                        fillColor: "#3fae7f"
                    });

                    var circle = new google.maps.Circle({
                        map: map,
                        center: new google.maps.LatLng(locations[0].latitude, locations[0].longitude),
                        radius: 20000,
                        strokeColor: "#ffb300",
                        fillColor: "#ffb300"
                    });


                    return markers;
                }



            });


            directionsRenderer.setMap(map);








        }).catch(e => {
            Swal.fire({
                icon: 'error',
                title: 'Oops...',
                text: 'No existen Colaboradores en este local!',
                footer: '<a href="">Agrega colaboradores importandolos desde el menu</a>'
            })
        });
    }
</script>