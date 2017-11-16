<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Dashboard</title>
        <link rel="stylesheet" href="../assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="../assets/css/animate.css">
        <link rel="stylesheet" href="../assets/css/custom.css">
    </head>	

    <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://malsup.github.io/min/jquery.form.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjjV1uvjkP2lgF1QJJV2OOY5Sj_Acfnro&libraries=places&callback=initAutocomplete"
    async defer></script>
    <script src="../assets/js/carregaPontos.js"></script>

    <body>
        <div class="left1 animated slideInLeft">
            <input type="text" class="form-control input-lg controls animated fadeIn" id="pac-input" placeholder="Pesquisa">
            <div class="map" id="map"></div>
        </div>
        <div id="linha" class="right1 animated slideInUp">

            <img src="../logo_marker.png" id="logo" width="70" height="100" />
            <h3 align="center" class="h3">Ligações Ativas</h3> 

            <div class="row" id="ligaçao" style="overflow: auto">
                <table id="tabela-ligacoes" class="table table-responsive-sm table-hover ">
                    <thead>
                        <tr>
                            <th>Usuário</th>
                            <th>Telefone</th>
                            <th>CPF</th>
                        </tr>
                    <tbody>
                    </tbody>
                    </thead>
                </table>
            </div>
        </div>
        <script>
            var ligacoes;
            $(document).ready(function () {
                tabela();
                //console.log(ligacoes);
            });
            function tabela() {
                var url = "http://zisc-env.j8phxubfpq.us-east-2.elasticbeanstalk.com/res/callhandler/";
                var linhas = "";
                $.get(url, function (data) {
                    ligacoes = data;
                    if ($('#tabela-ligacoes tbody') === 0) {
                        $('#tabela-ligacoes').append("<tbody></tbody>");
                    }
                    ligacoes.forEach(function (ligacao, index) {
                        linhas += '<tr data-id="' + index + '">' +
                                '<td>' + ligacao.usuario.nome + '</td>' +
                                '<td>' + ligacao.usuario.celular + '</td>' +
                                '<td>' + ligacao.usuario.cpf + '</td>' +
                                '</tr>';
                    });
                    $('#tabela-ligacoes tbody').append(linhas);
                }, 'json');
            }
            $('#tabela-ligacoes').on('click', 'tr', function () {
                var linha = $(this).data('id');
                ligacaoAtiva(ligacoes[linha]);
            });
        </script>
    </body>
</html>