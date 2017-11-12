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
            async defer>
    </script>
    <script src="../assets/js/carregaPontos.js"></script>
    <body style="background-color: #F7F7F7;">
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
        <h4 align="center">DASHBOARD - ZISC</h4> 
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="pull-left"> 
                        <img src="../logo_zisc.jpg" width="50" height="50" class="d-inline-block align-top" alt="">              
                    </a>
                </div>
                <a class="navbar-brand">  (Usuário)   </a>
                <ul class="nav navbar-nav navbar-right">
                    <a href="../index.html"  style="text-align: right;"> 
                        Voltar
                    </a>
                </ul>
            </div>
        </nav>
        <div class="left animated slideInLeft">
            <div class="map" id="map"></div>
        </div>
        <form class="form-inline">
            <br/>
            <h3 align="center">Ligações Ativas</h3> 
            <div class="row" id="ligaçao" style="overflow: auto">
                <table class="table table-responsive-sm table-hover ">
                    <thead>
                        <tr>
                    <h4></h4>
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
                                <th scope="row"><?php echo $i + 1 ?></th>
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
        </form>
  <script>
                function msg(tipo, texto) {
                    var msg;
                    if (tipo == 'success') {
                        msg = '<div class="alert alert-success alert-dismissible">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                                '<h4> <i class="icon fa fa-check"> </i>Sucesso!</h4>'
                                + texto +
                                '</div>';
                    } else {
                        msg = '<div class="alert alert-danger alert-dismissible">' +
                                '<button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>' +
                                '<h4><i class="icon fa fa-ban"></i> Erro!</h4>'
                                + texto +
                                '</div>';
                    }
                    $('.msg').html(msg);
                }
        </script>
        <script>
            var posicao = [];
            var i = 0;
<?php foreach ($calls as $call) { ?>
                var latitude, longitude, usuario, cpf, telefone;
                latitude = '<?php echo $call->latitude ?>';
                longitude = '<?php echo $call->longitude ?>';
                usuario = '<?php echo $call->usuario->nome ?>';
                cpf = '<?php echo $call->usuario->cpf ?>';
                telefone = '<?php echo $call->usuario->celular ?>';
                posicao[i] = {latitude, longitude, usuario, cpf, telefone};
                i++;
<?php } ?>
            ligacaoAtiva(posicao);
        </script>
    </body>
</html>