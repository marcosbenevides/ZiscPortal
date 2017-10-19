var base_url = 'http://localhost/ZiscPortal/';

function initAutocomplete() {

    var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -19.921378, lng: -43.954387},
        zoom: 13,
        mapTypeId: 'roadmap'
    });

    var pontos = [];
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://zisc-env.j8phxubfpq.us-east-2.elasticbeanstalk.com/res/consultaalerta/");
    xhr.addEventListener("load", function () {
        pontos = JSON.parse(xhr.responseText);
        pontos.forEach(function (alerta, index) {
            var uluru = {lat: Number(alerta.latitude), lng: Number(alerta.longitude)};

            if (alerta.ePositivo === true) {
                var icone = base_url + 'assets/imagens/azul.png';
            } else {
                var icone = base_url + 'assets/imagens/rosa.png';
            }

            var marker = new google.maps.Marker({
                position: uluru,
                title: alerta.tipo,
                map: map,
                icon: icone
            });

            var infowindow = new google.maps.InfoWindow(), marker;
            google.maps.event.addListener(marker, 'click', (function (marker, i) {
                return function () {
                    infowindow.setContent(alerta.usuario.nome + ': ' + alerta.observacao);
                    infowindow.open(map, marker);
                }
            })(marker))
        });
    });

    xhr.send();


    /*
     
     var pontospoliciais = [];
     var xhr1 = new XMLHttpRequest();
     xhr1.open("GET", "http://zisc-env.j8phxubfpq.us-east-2.elasticbeanstalk.com/res/consultadpto/");
     xhr1.addEventListener("load", function () {
     pontospoliciais = JSON.parse(xhr1.responseText);
     pontospoliciais.forEach(function(policial, index){
     var uluru = {lat: Number(policial.latitude), lng: Number(policial.longitude)};
     
     if (policial.baseFixa ==true) {
     var imagempm = "assets/imagens/policial.png";	
     } else {
     
     
     }
     
     var marker = new google.maps.Marker({
     position: uluru,
     title: alerta.tipo,
     map: map,
     icon: imagempm
     });
     
     var infowindow = new google.maps.InfoWindow(), marker;
     google.maps.event.addListener(marker, 'click', (function(marker, i) {
     return function() {
     infowindow.setContent(alerta.usuario.nome + ': ' + alerta.observacao);
     infowindow.open(map, marker);
     }
     })(marker))
     });
     }); 
     
     xhr1.send();
     
     
     */


    /*
     function converteEndereco(endereco, avaliacao) {
     geocoder.geocode( { 'address': endereco}, function(resultado, status) {
     if (status == google.maps.GeocoderStatus.OK) {
     var marcador = {
     latitude: resultado[0].geometry.location.k
     , longitude: resultado[0].geometry.location.D	
     , titulo: 'Novo marcador'
     , imagem: avaliacao
     }
     criaMarcador(marcador, map)
     } else {
     alert('Erro ao converter endereço: ' + status);
     }
     });
     }
     */



    var pmfixo = [
        [" ", -19.9152891, -43.9411373],
        [" ", -19.9229567, -43.9221838],
        [" ", -19.9253045, -43.9396099],
        [" ", -19.9241678, -43.9484458],
        [" ", -19.9180174, -43.9445962],
        [" ", -19.9214331, -43.9534137],
        [" ", -19.9328578, -43.9927331],
        [" ", -19.9645566, -43.9848184],
        //  [" ", -19.9627172, -43.965093],
        // [" ", -19.8399493, -43.9534913],
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
    var imagempm = base_url + "assets/imagens/policial.png";

    for (i = 0; i < pmfixo.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(pmfixo[i][1], pmfixo[i][2]),
            title: pmfixo[i][0],
            map: map,
            icon: imagempm
        });
    }

    var basemovel = [
        ['5', -19.9627172, -43.965093],
        ['6', -19.8399493, -43.9534913],
        [" ", -19.9902532, -44.0161493],
        [" ", -20.006727, -44.034802],
        [" ", -19.975249, -44.023307]];
    var carropm = base_url + "assets/imagens/carropm.png";

    for (i = 0; i < basemovel.length; i++) {
        marker = new google.maps.Marker({
            position: new google.maps.LatLng(basemovel[i][1], basemovel[i][2]),
            title: basemovel[i][0],
            map: map,
            icon: carropm
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

