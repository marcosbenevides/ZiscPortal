var base_url = 'http://localhost/ZiscPortal/';
var map;

function marcador(position, title, map, icon, info) {
    var marker = new google.maps.Marker({
        position: position,
        title: title,
        map: map,
        icon: icon
    });
    var infowindow = new google.maps.InfoWindow(), marker;
    google.maps.event.addListener(marker, 'click', (function (marker, i) {
        return function () {
            infowindow.setContent(info);
            infowindow.open(map, marker);
        }
    })(marker))
}
function carregarAlertas() {
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
            var infowindow = (alerta.usuario.nome + ': ' + alerta.observacao + ', ' + alerta.logHora)
            marcador(uluru, alerta.tipo, map, icone, infowindow);
        });
    });
    xhr.send();
}
function carregarPoliciais() {

    var pontospoliciais = [];
    var xhr1 = new XMLHttpRequest();
    xhr1.open("GET", "http://zisc-env.j8phxubfpq.us-east-2.elasticbeanstalk.com/res/consultadpto/");
    xhr1.addEventListener("load", function () {
        pontospoliciais = JSON.parse(xhr1.responseText);
        pontospoliciais.forEach(function (policial, index) {
            uluru = {lat: Number(policial.latitude), lng: Number(policial.longitude)};
            var icone = base_url + 'assets/imagens/policial.png';
            var infowindow = (policial.nome + ': ' + policial.bairro + ', ' + policial.cidade + '.' + policial.site)
            marcador(uluru, policial.nome, map, icone, infowindow);
        });
    });
    xhr1.send();
}
function initAutocomplete() {

    map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -19.921390, lng: -43.954558},
        zoom: 14,
        mapTypeId: 'roadmap'
    });

    carregarAlertas();
    carregarPoliciais();
}
