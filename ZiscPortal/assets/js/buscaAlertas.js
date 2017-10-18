var botaoBusca = document.querySelector('#botao-busca');
botaoBusca.addEventListener("click", function () {
    var pontos = [];
    var posicao = [];

    var xhr = new XMLHttpRequest();
    xhr.open("GET", "http://zisc.eastus2.cloudapp.azure.com:8080/ZiscWS/res/consultaalerta/");
    xhr.addEventListener("load", function () {
        pontos = JSON.parse(xhr.responseText);
        console.log(pontos);

        /*        for (var i = 0; i < pontos.length; i++) {
                    posicao[i] = {lat:parseInt(pontos[i]["latitude"]),lng:parseInt(pontos[i]["longitude"])}
                }

                var markers = posicao.map(function (location, i) {
                    return new google.maps.Marker({
                        position: location,
                        label: pontos[i % pontos.length]["tipo"]
                    });
                });

                var markerCluster = new MarkerClusterer(document.querySelector('map'), markers,
                    {imagePath: 'https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/m'});
                        for (var i = 0; i < pontos.length; i++) {
                                var posicao = {lat: parseInt(pontos[i]["latitude"]), lng: parseInt(pontos[i]["longitude"])}
                                var marker = new google.maps.Marker({
                                    position: posicao,
                                    map: document.querySelector('map'),
                                    title: pontos[i]["tipo"]
                            });
                        }*/
    });

    xhr.send();
})
