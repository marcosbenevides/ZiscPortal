function login() {

    //const URL = "http://ec2-18-221-165-93.us-east-2.compute.amazonaws.com:8080/ZiscWS/res/login" http://zisc-env.j8phxubfpq.us-east-2.elasticbeanstalk.com/res/;
    const URL = "http://zisc-env.j8phxubfpq.us-east-2.elasticbeanstalk.com/res/login";
    var email = btoa(document.getElementById("email").value);
    var senha = btoa(document.getElementById("senha").value);
    console.log(email);
    console.log(senha);
    var objeto = [];
    var xhr = new XMLHttpRequest();
    xhr.open("POST", URL, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            //console.log(JSON.parse(xhr.responseText));
            objeto = JSON.parse(xhr.responseText);
            console.log(objeto);
            
                document.getElementById('linha').innerHTML ="<div class='sessao'>"+
            "<ul class='nav nav-tabs'>"+ 
                "<li class='active'>"+
                    "<a data-toggle='tab' href='#cadastro'>Cadastro</a>"+
                "</li>"+
                "<li>"+
                    "<a data-toggle='tab' href='#alertas' onclick='minhasAlertas("+objeto.id+")'>Histórico de Alertas</a>"+
                "</li>"+
				"<li>"+
					"<a class ='btn btn-primary btn-block btn-lg mb-10' href='paginas/dashboard.php'>DashBoard</a>"+
                "</li>"+
            "</ul>"+
           "<div class='tab-content'>"+
            "<div id='cadastro' class='tab-pane fade in active'>"+
                    "<h3><center>Meu Cadastro</center></h3>"+
                    "<img width='40%' height='30%'  src='assets/imagens/semfoto2.png' alt='' title='Imagem do Usuário' vspace='10%' hspace='15%' border='10%' align='center'/>"+
                    "<p><label id='nome'>Nome: </label>"+" "+ objeto['nome'] +
                    "</p>"+
                    "<p><label id='telefone'>Telefone: </label>"+" "+ objeto['celular'] +
                    "</p>"+
                    "<p><label id='email'>E-mail: </label>"+ " "+objeto['email'] +
                    "</p>"+
                    "<p><label id='cpf'>CPF: </label>"+ " "+objeto['cpf'] +
                    "</p>"+
                "</div>"+
                "<div id='alertas' class='tab-pane fade'>"+
                    "<h3>Histórico de Alertas</h3>"+
                    "<p><label id='email'>Email: </label>" + objeto['email'] + "</p>"+
                "</div>"+
            "</div>"+
        "</div>"
        
        //---------------------------------------
                
            
                //var request = $.ajax({
                //  type: 'POST',
                //data: {rel: objeto},
                //url: 'paginas/status-page.php',
                //success: function (data, textStatus, jqXHR) {
                //  console.log('success');
                // $('#linha').load('paginas/status-page.php');
                }
            };
            //$('#linha').load('paginas/status-page.php');

        
    

    xhr.send("email=" +email + "&password=" +senha);

}