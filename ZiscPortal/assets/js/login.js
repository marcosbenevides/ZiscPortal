function login() {
    const URL = "http://zisc-env.j8phxubfpq.us-east-2.elasticbeanstalk.com/res/login";
    var email = btoa(document.getElementById("email").value);
    var senha = btoa(document.getElementById("senha").value);
    var objeto = [];
    var xhr = new XMLHttpRequest();
    xhr.open("POST", URL, true);
    xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    xhr.onreadystatechange = function () {
        if (xhr.readyState === XMLHttpRequest.DONE && xhr.status === 200) {
            objeto = JSON.parse(xhr.responseText);
            Cookies.set('User', JSON.stringify(objeto));
            document.getElementById('linha').innerHTML =
                    "<meta http-equiv='refresh' content='5; url=/ZiscPortal/ZiscPortal/paginas/home.html'>"
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
    xhr.send("email=" + email + "&password=" + senha);



}


