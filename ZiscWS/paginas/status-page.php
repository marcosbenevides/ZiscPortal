<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <title>Sessao</title>
        <link rel="stylesheet" href="assets/bootstrap/css/bootstrap.min.css">
        <link rel="stylesheet" href="assets/css/animate.css">
        <link rel="stylesheet" href="assets/css/custom.css">
    </head>
    <body>
        <?php
        //var_dump($_POST);  
        ?>
        <div class="sessao">
            <ul class='nav nav-tabs'> 
                <li class='active'>
                    <a data-toggle='tab' href='#inicio'>Início</a>
                </li>
                <li>
                    <a data-toggle ="tab" href="#cadastro">Cadastro</a>
                </li>
                <li>
                    <a data-toggle='tab' href='#alertas'>Histórico de Alertas</a>
                </li>
                
            </ul>
            <div class='tab-content'>
                
                <div id='inicio' class='tab-pane fade in active'>
                    <h3>Início</h3>
                    <p><label id="informações">Informações sobre o site: </label> 

                        

                    </p>
                </div>
                
                
                
                
                <div id='cadastro' class='tab-pane fade in active'>
                    <h3>Meu Cadastro</h3>
                    <p><label id="nome">Nome: </label> " + objeto['nome'] + "

                        // usar PHP pra pegar os dados

                    </p>
                </div>
                <div id='alertas' class='tab-pane fade'>
                    <h3>Histórico de Alertas</h3>
                    <p><label id="email">Email: </label>" + objeto['email'] + "</p>
                </div>
            </div>
        </div>
        <script>
            
            $(document).ready(function (){
                console.log(objeto);
            })
            
        </script>
    </body>
</html>