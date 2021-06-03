document.addEventListener('DOMContentLoaded',function() {

    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
        plugins: ['interaction', 'dayGrid', 'timeGrid', 'list'],
        header: {
            left: 'prev,next today',
            center: 'title',
            right: 'dayGridMonth,timeGridWeek,timeGridDay,listMonth'
        },
        themeSystem: 'bootstrap',
        navLinks: true, // can click day/week names to navigate views
        businessHours: true, // display business hours
        editable: true,
        events: 'includes/ajax/cargarEventos.php?todos=1',
        eventClick: function(arg) {
            var id = arg.event.id;

            var esCreador = false;
            $.ajax({
                url:'includes/ajax/comprobarCreadorEvento.php',
                data:{id:id},
                type:"POST",
                dataType: 'json',
                success: function(data) {
                    esCreador = data.esCreador;
                }
            })

            if (esCreador) {
                $('#editEventId').val(id);
                $('#deleteEvent').attr('data-id', id);

                $.ajax({
                    url:"includes/ajax/cargarEventos.php",
                    type:"GET",
                    dataType: 'json',
                    data:{id:id, todos:0},
                    success: function(data) {
                        $('#titulo').val(data.titulo);
                        $('#fechaInicio').val(data.fechaInicio);
                        $('#fechaFin').val(data.fechaFin);
                        $('#descripcion').val(data.descripcion);
                        $('#editeventmodal').modal();
                    }
                });

                $('body').on('click', '#deleteEvent', function() {
                    if(confirm("¿Seguro que quieres borrar este evento?")) {
                        $.ajax({
                            url:"includes/ajax/eliminarEvento.php",
                            type:"POST",
                            data:{id:arg.event.id},
                        });

                        //close model
                        $('#editeventmodal').modal('hide');

                        //refresh calendar
                        calendar.refetchEvents();
                    }
                });

                calendar.refetchEvents();
            }
         }
    });

    calendar.render();

    $('#createEvent').submit(function(event) {

        event.preventDefault();

        $('.form-group').removeClass('has-error');
        $('.help-block').remove();

        $.post("includes/ajax/crearEvento.php", $(this).serialize(), "json")
            .done(function (data) {
                if (data === "success") {

                    //remove any form data
                    $('#createEvent').trigger("reset");

                    //close model
                    $('#crearEventoModal').modal('hide');

                    //refresh calendar
                    calendar.refetchEvents();

                } else {

                    //if error exists update html
                    if (data.errors.date) {
                        $('#date-group').addClass('has-error');
                        $('#date-group').append('<div class="help-block">' + data.errors.date + '</div>');
                    }

                    if (data.errors.title) {
                        $('#title-group').addClass('has-error');
                        $('#title-group').append('<div class="help-block">' + data.errors.title + '</div>');
                    }

                }
            });
    });

    $('#editEvent').submit(function(event) {

        // stop the form refreshing the page
        event.preventDefault();

        $('.form-group').removeClass('has-error'); // remove the error class
        $('.help-block').remove(); // remove the error text

        //form data
        var id = $('#editEventId').val();
        var title = $('#titulo').val(data.titulo);
        var start= $('#fechaInicio').val(data.fechaInicio);
        var end = $('#fechaFin').val(data.fechaFin);
        var descripcion = $('#descripcion').val(data.descripcion);
        var idCreador = $('#idCreador').val(data.idCreador);

        // process the form
        $.ajax({
            type        : "POST",
            url         : "includes/ajax/actualizarEvento.php",
            data        : {
                id:id,
                titulo:title,
                fechaInicio:start,
                fechaFin:end,
                descripcion:descripcion,
                idCreador: idCreador
            },
            dataType    : 'json',
            encode      : true
        }).done(function(data) {

            // insert worked
            if (data.success) {

                //remove any form data
                $('#editEvent').trigger("reset");

                //close model
                $('#editeventmodal').modal('hide');

                //refresh calendar
                calendar.refetchEvents();

            } else {

                //if error exists update html
                if (data.errors.date) {
                    $('#date-group').addClass('has-error');
                    $('#date-group').append('<div class="help-block">' + data.errors.date + '</div>');
                }

                if (data.errors.title) {
                    $('#title-group').addClass('has-error');
                    $('#title-group').append('<div class="help-block">' + data.errors.title + '</div>');
                }
            }
        });
    });
});