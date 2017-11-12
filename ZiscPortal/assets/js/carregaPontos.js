var base_url = 'http://localhost/ZiscPortal/';
var map;
var markers = [];
function sleep(milliseconds) {
  var start = new Date().getTime();
  for (var i = 0; i < 1e7; i++) {
    if ((new Date().getTime() - start) > milliseconds){
      break;
    }
  }
}
function marcador(position, title, map, icon, info) {
    var marker = new google.maps.Marker({
        position: position,
        title: title,
        map: map,
        icon: icon
    });
    markers.push(marker);
    var infowindow = new google.maps.InfoWindow({
        content: info,
        maxWidth: 220
    });
    marker.addListener('click', function () {
        infowindow.open(map, marker);
    });
}
function carregarAlertas(a) {
    var pontos = [];
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://zisc-env.j8phxubfpq.us-east-2.elasticbeanstalk.com/res/consultaalerta/");
    xhr.addEventListener("load", function () {
        pontos = JSON.parse(xhr.responseText);
        pontos.forEach(function (alerta, index) {
            var infowindow =
                    '<div id="content">' +
                    '<div id="siteNotice">' +
                    '</div>' +
                    '<h3 id="thirdHeading" class="thirdHeading">INFO</h3>' +
                    '<div id="bodyContent">' +
                    '<p><b>' + alerta.tipo + ' (' + alerta.logHora + ')' + '</b></p></p>' +
                    '<p> Tipo Alerta: ' + alerta.tipo + '</p>' +
                    '<p> Data e Hora: ' + alerta.logHora + '</p>' +
                    '<p> Ocorrência: ' + alerta.observacao + '</p>' +
                    '</div>' +
                    '</div>';
            var uluru = {lat: Number(alerta.latitude), lng: Number(alerta.longitude)};
            if (alerta.ePositivo === true) {
                var icone = base_url + 'assets/imagens/azul.png';
            } else {
                var icone = '';
            }
            if (a == "todas") {
                marcador(uluru, alerta.tipo, map, icone, infowindow);
            } else if (alerta.usuario.id == a) {
                marcador(uluru, alerta.tipo, map, icone, infowindow);
            }
        });
    });
    xhr.send();
}
function carregarPoliciais() {
    var pontospoliciais = [];
    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://zisc-env.j8phxubfpq.us-east-2.elasticbeanstalk.com/res/consultadpto/");
    xhr.addEventListener("load", function () {
        pontospoliciais = JSON.parse(xhr.responseText);
        pontospoliciais.forEach(function (policial, index) {
            uluru = {lat: Number(policial.latitude), lng: Number(policial.longitude)};
            var icone = base_url + 'assets/imagens/police(2).png';
            var infowindow =
                    '<div id="content">' +
                    '<div id="siteNotice">' +
                    '</div>' +
                    '<h4 id="thirdHeading" class="thirdHeading">' + policial.nome + '</h4>' +
                    '<div id="bodyContent">' +
                    '<p> Endereço: ' + policial.endereco + ', ' + policial.numero + ', ' + policial.bairro + '. ' + policial.cidade + '</p>' +
                    '<p> Site: ' + policial.site + '</p>' +
                    '</div>' +
                    '</div>';
            marcador(uluru, policial.nome, map, icone, infowindow);
        });
    });
    xhr.send();
}
function ligacaoAtiva(posicao) {
    deleteMarkers();
	for(var i=0; i <posicao.length;i++){
		console.log(posicao[i]);
		uluru = {lat: Number(posicao[i].latitude), lng: Number(posicao[i].longitude)};
		console.log(uluru);
        var icone = '';
		var infowindow = 
                    '<div id="content">' +
                    '<div id="siteNotice">' +
                    '</div>' +
                    '<h4 id="thirdHeading" class="thirdHeading">' + posicao[i].usuario + '</h4>' +
                    '<div id="bodyContent">' +
                    '<p> CPF: ' + posicao[i].cpf + '</p>' +
                    '<p> TEL: ' + posicao[i].telefone + '</p>' +
                    '</div>' +
                    '</div>';;
		marcador(uluru, posicao[i].usuario, map, icone, infowindow);
	}
}
// Sets the map on all markers in the array.
function setMapOnAll(map) {
    for (var i = 0; i < markers.length; i++) {
        markers[i].setMap(map);
    }
}
// Removes the markers from the map, but keeps them in the array.
function clearMarkers() {
    setMapOnAll(null);
}
// Shows any markers currently in the array.
function showMarkers() {
    setMapOnAll(map);
}
// Deletes all markers in the array by removing references to them.
function deleteMarkers() {
    clearMarkers();
    markers = [];
}
// mostrando somente as alerta criadas pelo usuario logado
function minhasAlertas(id) {
    deleteMarkers();
    carregarAlertas(id);
}
function todasAlertas() {
    deleteMarkers();
    carregarAlertas("todas");
    carregarPoliciais();
    //var markerCluster = new MarkerClusterer(map, markers,
    // {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
}
function initAutocomplete() {
    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -19.921390, lng: -43.954558},
        zoom: 14,
        mapTypeId: google.maps.MapTypeId.ROADMAP
    });
 }
