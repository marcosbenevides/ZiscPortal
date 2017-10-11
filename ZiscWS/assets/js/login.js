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
        if (xhr.readyState == XMLHttpRequest.DONE && xhr.status == 200) {
            //console.log(JSON.parse(xhr.responseText));
            objeto = JSON.parse(xhr.responseText)
            console.log(objeto);
            var request = $.ajax({
                type: 'POST',
                url: 'paginas/status-page.php',
                data: xhr.responseText,
                success: function (data, textStatus, jqXHR) {
                    console.log('success');
                }
            });
            $('#linha').load('paginas/status-page.php');

        }
    };

    xhr.send("email=" + email + "&password=" + senha);

}