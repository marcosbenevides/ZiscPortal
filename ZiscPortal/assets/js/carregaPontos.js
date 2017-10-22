var base_url = 'http://localhost/ZiscPortal/';

function initAutocomplete() {

var map = new google.maps.Map(document.getElementById('map'), {
        center: {lat: -19.921390, lng: -43.954558},
        zoom: 14,
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
	
	
     var pontospoliciais = [];
     var xhr1 = new XMLHttpRequest();
     xhr1.open("GET", "http://zisc-env.j8phxubfpq.us-east-2.elasticbeanstalk.com/res/consultadpto/");
     xhr1.addEventListener("load", function () {
     pontospoliciais = JSON.parse(xhr1.responseText);
     pontospoliciais.forEach(function(policial, index){
     var geocoder = new google.maps.Geocoder();
     endereco = (policial.endereco + ', ' + policial.numero + ', ' + policial.bairro + ', ' + policial.cidade);
     geocoder.geocode({ 'address': endereco + ', Brasil', 'region': 'BR' }, function (results, status) {
        if (status == google.maps.GeocoderStatus.OK) {
           if (results) {
                var lat = results[0].geometry.location.lat();
                var lon = results[0].geometry.location.lng();
		var uluru1 = {lat: Number(lat), lng: Number(lon)};
		var icone1 = base_url + 'assets/imagens/policial.png';

		var marker1 = new google.maps.Marker({
        		position: uluru1,
			title: policial.nome,
			map: map,
			icon: icone1
		});
            }  else {
		alert('Erro ao converter endereço: ' + status);
            }
	}	
    });     
  });
});
xhr1.send();
}

