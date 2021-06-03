$(function() {
    let estado = $(".dropdown").data("estado");
    if ( estado === "sin-seguir" ) {
        cambiarASinSeguir();
    }
    else if ( estado === "siguiendo" ) {
        cambiarASiguiendo();
    }
    else if ( estado === "completada" ) {
        cambiarACompletada();
    }

    $("#empezarSeguir").click( function () {
        $.post("includes/ajax/seguirRutina.php", {estado: "seguir", idRutina: $(".dropdown").data("rutina")}, function () {
            cambiarASiguiendo();
        })
            .fail( errorCambioEstado )
    });
    $("#dejarSeguir").click( function () {
        $.post("includes/ajax/seguirRutina.php", {estado: "dejarSeguir", idRutina: $(".dropdown").data("rutina")}, function () {
            cambiarASinSeguir();
        })
            .fail( errorCambioEstado )
    });
    $("#marcarCompletada").click( function () {
        $.post("includes/ajax/seguirRutina.php", {estado: "completar", idRutina: $(".dropdown").data("rutina")}, function () {
            cambiarACompletada();
            insigniaCompletada();
        })
            .fail( errorCambioEstado )
    });
    $("#desmarcarCompletada").click( function () {
        $.post("includes/ajax/seguirRutina.php", {estado: "dejarSeguir", idRutina: $(".dropdown").data("rutina")}, function () {
            cambiarASinSeguir();
        })
            .fail( errorCambioEstado )
    });
});

function cambiarASinSeguir() {
    let button = $("#botonSeguir");
    button.html("Seguir");
    if (button.hasClass("btn-success")) {
        button.removeClass("btn-success");
    }
    if (button.hasClass("btn-primary")) {
        button.removeClass("btn-primary");
    }
    button.addClass("btn-secondary");
    $("#empezarSeguir").show();
    $("#dejarSeguir").hide();
    $("#marcarCompletada").show();
    $("#desmarcarCompletada").hide();
    $(".dropdown").data("estado", "sin-seguir");
}

function cambiarASiguiendo() {
    let button = $("#botonSeguir");
    button.html("Siguiendo");
    if (button.hasClass("btn-success")) {
        button.removeClass("btn-success");
    }
    if (button.hasClass("btn-secondary")) {
        button.removeClass("btn-secondary");
    }
    button.addClass("btn-primary");
    $("#empezarSeguir").hide();
    $("#dejarSeguir").show();
    $("#marcarCompletada").show();
    $("#desmarcarCompletada").hide();
    $(".dropdown").data("estado", "siguiendo");
}

function cambiarACompletada() {
    let button = $("#botonSeguir");
    button.html("Completada");
    if (button.hasClass("btn-primary")) {
        button.removeClass("btn-primary");
    }
    if (button.hasClass("btn-secondary")) {
        button.removeClass("btn-secondary");
    }
    button.addClass("btn-success");
    $("#empezarSeguir").hide();
    $("#dejarSeguir").hide();
    $("#marcarCompletada").hide();
    $("#desmarcarCompletada").show();
    $(".dropdown").data("estado", "completada");
}

function errorCambioEstado() {
    alert("Ha habido un error a la hora de cambiar de estado");
}

function insigniaCompletada() {
    $.post('includes/ajax/insignias.php', {nombreInsignia: "Primera rutina completada", peticion: "buscar"}, function (data) {
        if (!data.existe) {
            $.post('includes/ajax/comprobarNumRutinasCompletadas.php', function (data) {
                if (data.primeraRutina) {
                    $.post('includes/AJAX/insignias.php', {nombreInsignia: "Primera rutina completada", peticion: "insertar"}, function () {
                        $("#notificacionPrimeraCompletada").toast("show");
                    }, 'json');
                }
            }, 'json');
        }
        else {
            $.post('includes/ajax/insignias.php', {nombreInsignia: "Todas las rutinas completadas", peticion: "buscar"}, function (data) {
                if (!data.existe) {
                    $.post('includes/ajax/comprobarNumRutinasCompletadas.php', function (data) {
                        if (data.todasCompletadas) {
                            $.post('includes/ajax/insignias.php', {nombreInsignia: "Todas las rutinas completadas", peticion: "insertar"}, function () {
                                $("#notificacionTodasCompletadas").toast("show");
                            }, 'json');
                        }
                    }, 'json');
                }
            }, 'json');
        }
    }, 'json');
}