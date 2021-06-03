$(function() {
    $.post('includes/ajax/insignias.php', {nombreInsignia: "Primer post", peticion: "buscar"}, function (data) {
       if (!data.existe) {
            $.post('includes/ajax/comprobarNumPosts.php', function (data) {
               if (data.numPosts === 1) {
                   $.post('includes/ajax/insignias.php', {nombreInsignia: "Primer post", peticion: "insertar"}, function () {
                       $("#notificacionPrimerPost").toast("show");
                   }, 'json');
               }
            }, 'json');
       }
    }, 'json');
})