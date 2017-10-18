<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <style>
       #map {
        height: 660px;
        width: 100%;
        margin: 30px 0px;
       }
       #ligaçao{
        margin: 30px 0px;
        height: 310px;
       }
       #online{
        margin: 30px 0px;
        height: 310px;
       }
     </style>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
  </head>
  <body style="background-color: #eee;">
 <div class="container">
  <div class="row align-items-start">
    <div class="col-md col-lg"> 
<div id="map"></div>   
<script src="https://developers.google.com/maps/documentation/javascript/examples/markerclusterer/markerclusterer.js"></script>
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
<script src="assets/bootstrap//js/bootstrap.min.js"></script>

<script>

    function trocaConteudo() {
        console.log("Entrei no Evento");
        document.getElementById("linha").innerHTML = "<p>teste</p>";
    }

</script>

<script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAjjV1uvjkP2lgF1QJJV2OOY5Sj_Acfnro&libraries=places&callback=initAutocomplete"
        async defer></script>
<script src="../assets/js/carregaPontos.js"></script>
                    
<a class="btn btn-primary btn-lg btn-block" href="../index.html">Voltar</button></a>
    </div>
   
      <div class="col-md col-lg-7">
      <div class="row" id="ligaçao" style="overflow: auto">
    <table class="table table-sm table-hover">
  <thead>
    <tr>
      <br><h4>Ligações Ativas</h4>
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
      <td><font color ="#FF0000"><b>Data[nome]</b></font></td>
      <td>Data[telefone]</td>
      <td>Data[cpf]</td>
    </tr>
    <tr>
      <th scope="row">2</th>
      <td>Data[nome2]</td>
      <td>Data[telefone2]</td>
      <td>Data[cpf2]</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Data[nome3]</td>
      <td>Data[telefone3]</td>
      <td>Data[cpf3]</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Data[nome4]</td>
      <td>Data[telefone4]</td>
      <td>Data[cpf4]</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Data[nome5]</td>
      <td>Data[telefone5]</td>
      <td>Data[cpf5]</td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>Data[nome6]</td>
      <td>Data[telefone6]</td>
      <td>Data[cpf6]</td>
    </tr>
    <tr>
      <th scope="row">7</th>
      <td>Data[nome7]</td>
      <td>Data[telefone7]</td>
      <td>Data[cpf7]</td>
    </tr>
     <tr>
      <th scope="row">8</th>
      <td>Data[nome8]</td>
      <td>Data[telefone8]</td>
      <td>Data[cpf8]</td>
    </tr>
     <tr>
      <th scope="row">9</th>
      <td>Data[nome9]</td>
      <td>Data[telefone9]</td>
      <td>Data[cpf9]</td>
    </tr>
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
    <tr>
      <th scope="row">2</th>
      <td>Data[nome2]</td>
      <td>Data[telefone2]</td>
      <td>Data[cpf2]</td>
    </tr>
    <tr>
      <th scope="row">3</th>
      <td>Data[nome3]</td>
      <td>Data[telefone3]</td>
      <td>Data[cpf3]</td>
    </tr>
    <tr>
      <th scope="row">4</th>
      <td>Data[nome4]</td>
      <td>Data[telefone4]</td>
      <td>Data[cpf4]</td>
    </tr>
    <tr>
      <th scope="row">5</th>
      <td>Data[nome5]</td>
      <td>Data[telefone5]</td>
      <td>Data[cpf5]</td>
    </tr>
    <tr>
      <th scope="row">6</th>
      <td>Data[nome6]</td>
      <td>Data[telefone6]</td>
      <td>Data[cpf6]</td>
    </tr>
    <tr>
      <th scope="row">7</th>
      <td>Data[nome7]</td>
      <td>Data[telefone7]</td>
      <td>Data[cpf7]</td>
    </tr>
     <tr>
      <th scope="row">8</th>
      <td>Data[nome8]</td>
      <td>Data[telefone8]</td>
      <td>Data[cpf8]</td>
    </tr>
     <tr>
      <th scope="row">9</th>
      <td>Data[nome9]</td>
      <td>Data[telefone9]</td>
      <td>Data[cpf9]</td>
    </tr>
    </tbody>
</table>

</div>
    </div>
  </div>
   
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>