/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

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
