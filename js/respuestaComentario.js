$(function() {
    $('.ajax-link').click( function() {
        var idComentario = $(this).attr('data-idComentario');
        $.get( $(this).attr('href'), function(msg) {
            $(#idComentario).html = msg.decode();
        });
        return false;
    });
});