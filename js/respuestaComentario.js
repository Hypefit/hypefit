$(function() {
    $('.ajax-link').click( function() {
        let idComentario = $(this).attr('data-idComentario');
        let idPost = $(this).attr('data-idPost');
        $.get( $(this).attr('href'), {idComentarioPadre: idComentario, idPost: idPost}, function(msg) {
            $("#" + idComentario).html( msg.html);
        }, "json");
        return false;
    });
});