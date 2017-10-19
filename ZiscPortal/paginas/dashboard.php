<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
        <link rel="stylesheet" href="../assets/css/custom.css">
        <link rel="stylesheet" href="../assets/css/animate.css">
    </head>
    <body style="background-color: #eee;">
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
        <div class="container">
            <div name="msg" id="msg"></div>
            <div class="row align-items-start">
                <div class="col-md col-lg"> 
                    <div id="map" class="map"></div>   
                    <input type="text" class="form-control input-lg controls animated fadeIn fixed barra-pesquisa" id="pac-input" placeholder="Pesquisa">
                    <a class="btn btn-primary btn-lg btn-block" href="../index.html">Voltar</button></a>
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
                                            <th scope="row"><?php echo $i + 1 ?></th>
                                            <td>
                                                <font color ="#FF0000">
                                                <b><?php echo $call->usuario->nome ?></b>
                                                </font>
                                            </td>
                                            <td><?php echo $call->usuario->celular ?></td>
                                            <td><?php echo $call->usuario->cpf ?></td>
                                        </tr>
                                    <?php }?>
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
        </div>
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
        <script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>

        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjjV1uvjkP2lgF1QJJV2OOY5Sj_Acfnro&libraries=places&callback=initAutocomplete"
        async defer></script>
        <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
        <script src="../assets/js/carregaPontos.js"></script>

    </body>
</html>