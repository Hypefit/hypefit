$(function() {
    $.post('includes/AJAX/insignias.php', {nombreInsignia: "Primer post", peticion: "buscar"}, function (data) {
       if (!data.existe) {
            $.post('includes/AJAX/comprobarNumPosts.php', function (data) {
               if (data.numPosts === 1) {
                   $.post('includes/AJAX/insignias.php', {nombreInsignia: "Primer post", peticion: "insertar"}, function () {
                       $("#notificacionPrimerPost").toast("show");
                   }, 'json');
               }
            }, 'json');
       }
    }, 'json');
})