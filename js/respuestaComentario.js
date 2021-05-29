$(function() {
    $('.ajax-link').click( function() {
        var idComentario = $(this).attr('data-idComentario');
        $.get( $(this).attr('href'), function(msg) {
            var json = $.parseJSON(msg);
            $(idComentario).html = json.html;
        });
        return false;
    });
});