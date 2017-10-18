<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link rel="stylesheet" href="../assets/css/custom.css">
        <link rel="stylesheet" href="../assets/css/animate.css">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
    <?php

    function buscaCall() {
        $server = "http://zisc-env.j8phxubfpq.us-east-2.elasticbeanstalk.com/res/callhandler/";
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $server);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $return = json_decode(curl_exec($ch));
        curl_close($ch);
        return $return;
    }
    ?>
    <body style="background-color: #eee;">
        <div class="container">
            <div class="row align-items-start">
                <div class="col-md col-lg"> 
                    <input type="text" class="form-control input-lg controls animated fadeIn fixed" id="pac-input" placeholder="Pesquisa">
                    <div id="map"></div>   
                    <a class="btn btn-primary btn-lg btn-block" href="../index.php">Voltar e Sair</a>
                </div>
                <div class="col-md col-lg-7">
                    <div class="row" id="ligaçao" style="overflow: auto">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                            <h4>Ligações Ativas</h4>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Usuário</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                            </tr>
                            </thead>
                            <tbody>
                                <?php $calls = buscaCall(); ?>
                                <?php $i = 0; ?>
                                <?php foreach ($calls as $call) { ?>
                                <tr>
                                    <th scope="row"><?php echo $i+1 ?></th>
                                    <td>
                                        <font color ="#FF0000">
                                        <b><?php echo $call->usuario->nome ?></b>
                                        </font>
                                    </td>
                                    <td><?php echo $call->usuario->celular ?></td>
                                    <td><?php echo $call->usuario->cpf ?></td>
                                </tr>
                                <?php } ?>
                            </tbody>
                        </table>
                    </div>
                    <div class="row" id="online" col-8 style="overflow: auto">
                        <table class="table table-sm table-hover">
                            <thead>
                                <tr>
                            <h4>Usuários Online</h4>
                            </tr>
                            <tr>
                                <th>#</th>
                                <th>Usuário</th>
                                <th>Telefone</th>
                                <th>CPF</th>
                            </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th scope="row">1</th>
                                    <td><font color ="#008000"><b>Data[nome]</b></font></td>
                                    <td>Data[telefone]</td>
                                    <td>Data[cpf]</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
            <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
            <script>

                function trocaConteudo() {
                    console.log("Entrei no Evento");
                    document.getElementById("linha").innerHTML = "<p>teste</p>";
                }


                function initAutocomplete() {







                    var map = new google.maps.Map(document.getElementById('map'), {
                        center: {lat: -19.921378, lng: -43.954387},
                        zoom: 13,
                        mapTypeId: 'roadmap'
                    });



                    var pmfixo = [

                        [" ", -19.9152891, -43.9411373],
                        [" ", -19.9229567, -43.9221838],
                        [" ", -19.9253045, -43.9396099],
                        [" ", -19.9241678, -43.9484458],
                        [" ", -19.9180174, -43.9445962],
                        [" ", -19.9214331, -43.9534137],
                        [" ", -19.9328578, -43.9927331],
                        [" ", -19.9645566, -43.9848184],
                        [" ", -19.9627172, -43.965093],
                        [" ", -19.8399493, -43.9534913],
                        [" ", -19.8298557, -43.9595337],
                        [" ", -19.844607, -43.9336853],
                        [" ", -19.9159934, -43.9179171],
                        [" ", -19.9143895, -43.9177139],
                        [" ", -19.8667684, -43.9292051],
                        [" ", -19.8912776, -43.9150578],
                        [" ", -19.8645657, -43.9294646],
                        [" ", -19.9538049, -43.9490907],
                        [" ", -19.9492724, -43.9401913],
                        [" ", -19.9429887, -43.9655151],
                        [" ", -19.9448723, -43.9186639],
                        [" ", -19.9130182, -43.8974512],
                        [" ", -19.9010153, -43.9680609],
                        [" ", -19.8952469, -44.0076147],
                        [" ", -19.9221346, -43.9862618],
                        [" ", -19.8720757, -43.9905567],
                        [" ", -19.9079285, -43.9640125],
                        [" ", -19.9755012, -44.0255491],
                        [" ", -19.9902532, -44.0161493],
                        [" ", -20.006727, -44.034802],
                        [" ", -19.975249, -44.023307],
                        [" ", -19.815928, -43.967967],
                        [" ", -19.813917, -43.956268],
                        [" ", -19.9293856, -43.9305099],
                        [" ", -19.829486, -44.001653],
                    ];
                    var imagempm = "assets/imagens/teste.png";

                    for (i = 0; i < pmfixo.length; i++) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(pmfixo[i][1], pmfixo[i][2]),
                            title: pmfixo[i][0],
                            map: map,
                            //icon: imagempm
                        });
                    }





                    var basemovel = [
                        ['5', -19.9627172, -43.965093],
                        ['6', -19.8399493, -43.9534913],
                    ];
                    var carropm = "assets/imagens/carropm.jpg";

                    for (i = 0; i < basemovel.length; i++) {
                        marker = new google.maps.Marker({
                            position: new google.maps.LatLng(basemovel[i][1], basemovel[i][2]),
                            title: basemovel[i][0],
                            map: map,
                            //icon: carropm
                        });
                    }




                    var input = document.getElementById('pac-input');
                    var searchBox = new google.maps.places.SearchBox(input);
                    map.controls[google.maps.ControlPosition.TOP_LEFT].push(input);

                    map.addListener('bounds_changed', function () {
                        searchBox.setBounds(map.getBounds());
                    });

                    var markers = [];
                    // Listen for the event fired when the user selects a prediction and retrieve
                    // more details for that place.
                    searchBox.addListener('places_changed', function () {
                        var places = searchBox.getPlaces();

                        if (places.length == 0) {
                            return;
                        }

                        // Clear out the old markers.
                        markers.forEach(function (marker) {
                            marker.setMap(null);
                        });
                        markers = [];

                        // For each place, get the icon, name and location.
                        var bounds = new google.maps.LatLngBounds();
                        places.forEach(function (place) {
                            if (!place.geometry) {
                                console.log("Returned place contains no geometry");
                                return;
                            }

                            var icon = {
                                url: place.icon,
                                size: new google.maps.Size(71, 71),
                                origin: new google.maps.Point(0, 0),
                                anchor: new google.maps.Point(17, 34),
                                scaledSize: new google.maps.Size(25, 25)
                            };

                            // Create a marker for each place.
                            markers.push(new google.maps.Marker({
                                map: map,
                                icon: icon,
                                title: place.name,
                                position: place.geometry.location
                            }));

                            if (place.geometry.viewport) {
                                // Only geocodes have viewport.
                                bounds.union(place.geometry.viewport);
                            } else {
                                bounds.extend(place.geometry.location);
                            }
                        });
                        map.fitBounds(bounds);
                    });
                }

            </script>
            <!-- Optional JavaScript -->
            <!-- jQuery first, then Popper.js, then Bootstrap JS -->
            <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
            <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjjV1uvjkP2lgF1QJJV2OOY5Sj_Acfnro&libraries=places&callback=initAutocomplete" async defer></script>
            <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    </body>
</html>