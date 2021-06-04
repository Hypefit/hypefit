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
        editable: false,
        aspectRatio: 3,
        locale: 'es',
        events: 'includes/ajax/eventos/load.php',
        eventRender: function(info) {
            var start = info.event.start;
            var end = info.event.end;
            var startTime;
            var endTime;

            if (!start) {
                startTime = '';
            } else {
                startTime = start;
            }

            if (!end) {
                endDate = '';
            } else {
                endTime = end;
            }

            var title = info.event.title;

            $(info.el).popover({
                title: title,
                placement:'top',
                trigger : 'hover',
                content: info.event.extendedProps.descripcion,
                container:'body'
            }).popover('show');
        },
        eventClick: function(arg) {
            var id = arg.event.id;

            $.ajax({
                url: 'includes/ajax/eventos/comprobarCreadorEvento.php',
                data: {id: id},
                type: "POST",
                dataType: 'json',
                success: function (data) {
                    if (data.esCreador) {
                        $('#editEventId').val(id);
                        $('#deleteEvent').attr('data-id', id);

                        var myModal = new bootstrap.Modal(document.getElementById('editarEventoModal'));
                        $.post("includes/ajax/eventos/getevent.php", {id: id}, "json")
                            .done(function (data) {
                                json = JSON.parse(data);
                                $('#editartitulo').val(json.title);
                                $('#editarfechaInicio').val(json.start);
                                $('#editarfechaFin').val(json.end);
                                $('#editardescripcion').val(json.descripcion);
                                myModal.show();
                            });

                        $('body').on('click', '#deleteEvent', function () {
                            if (confirm("¿Seguro que quieres borrar este evento?")) {
                                $.ajax({
                                    url: "includes/ajax/eventos/delete.php",
                                    type: "POST",
                                    data: {id: arg.event.id},
                                });

                                //close model
                                myModal.hide();

                                //refresh calendar
                                calendar.refetchEvents();
                            }
                        });
                    }
                }
            });
        },
    });

    calendar.render();

    $('#createEvent').submit(function(event) {

        event.preventDefault();

        $('.form-group').removeClass('has-error');
        $('.help-block').remove();

        $.post("includes/ajax/eventos/insert.php", $(this).serialize(), "json")
            .done(function (data) {
                var json = JSON.parse(data);
                if (json.success) {

                    //remove any form data
                    $('#createEvent').trigger("reset");

                    //close model
                    $("#crearEventoModal .btn-close").click()

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
        var title = $('#editartitulo').val();
        var start= $('#editarfechaInicio').val();
        var end = $('#editarfechaFin').val();
        var descripcion = $('#editardescripcion').val();
        var idCreador = $('#idCreador').val();

        // process the form
        $.ajax({
            type        : "POST",
            url         : "includes/ajax/eventos/update.php",
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
                $("#editarEventoModal .btn-close").click()

                //refresh calendar
                calendar.refetchEvents();

            } else {

                //if error exists update html
                if (json.errors.date) {
                    $('#date-group').addClass('has-error');
                    $('#date-group').append('<div class="help-block">' + data.errors.date + '</div>');
                }

                if (json.errors.title) {
                    $('#title-group').addClass('has-error');
                    $('#title-group').append('<div class="help-block">' + data.errors.title + '</div>');
                }
            }
        });
    });
});