$(function() {
    $('.ajax-link').click( function() {
        let idComentario = $(this).attr('data-idComentario');
        let idPost = $(this).attr('data-idPost');
        $.get( "/hypefit/includes/AJAX/formularioRespuestaComentario.php", {idComentarioPadre: idComentario, idPost: idPost, es_Respuesta: true}, function(msg) {
            $("#" + idComentario).html( msg.html);
        }, "json");
        return false;
    });
});