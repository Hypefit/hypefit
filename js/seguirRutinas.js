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
        cambiarASiguiendo();
    });
    $("#dejarSeguir").click( function () {
        cambiarASinSeguir();
    });
    $("#marcarCompletada").click( function () {
        cambiarACompletada();
    });
    $("#desmarcarCompletada").click( function () {
        cambiarASinSeguir();
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
    $("#dejarSeguir").show();
    $("#marcarCompletada").hide();
    $("#desmarcarCompletada").show();
    $(".dropdown").data("estado", "completada");
}

