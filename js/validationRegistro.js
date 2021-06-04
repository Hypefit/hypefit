    $(document).ready(function(){
        var modif = false;
        //  errores = [User, Email, Pass, Pass2, Rol]
        var errores = [true, true, true, true, true];
        var inputs = ["#nombreRegistro", "#emailRegistro", "#passwordRegistro", "#password2Registro", "#rolRegistro"]

        $(inputs[0]).keyup(function(){ //input nombre
            modif=true;
            $.post("includes/ajax/validationRegistro.php", {user: $(inputs[0]).val()}, function(data) {
                $(inputs[0]).addClass("border border-2");
                $("#errorUser").html(data);
                if (data !== "") {
                    errores[0] = true;
                    $(inputs[0]).removeClass("border-success");
                    $(inputs[0]).addClass("border-danger");
                }
                else {
                    $(inputs[0]).addClass("border-success");
                    $(inputs[0]).removeClass("border-danger");
                    errores[0] = false;
                }
            });
            //$("#errorUser").load("/hypefit/includes/ajax/validationRegistro.php", {user: $(inputs[0]).val()});
                //errores[0] = $("#errorUser").text() !== "";
        });

        $(inputs[1]).keyup(function(){ //input email
            modif=true;

            $.post("includes/ajax/validationRegistro.php", {email: $(inputs[1]).val()}, function(data) {
                $(inputs[1]).addClass("border border-2");
                $("#errorEmail").html(data);
                if (data !== "") {
                    errores[1] = true;
                    $(inputs[1]).removeClass("border-success");
                    $(inputs[1]).addClass("border-danger");
                } else {
                    $(inputs[1]).removeClass("border-danger");
                    $(inputs[1]).addClass("border-success");
                    errores[1] = false;
                }
            });
            //$("#errorEmail").load("/hypefit/includes/ajax/validationRegistro.php", {email: $(inputs[1]).val()});
            //errores[1] = $("#errorEmail").text() !== "";
        });

        $(inputs[2]).keyup(function (){//input password
            modif=true;

            $.post("includes/ajax/validationRegistro.php", {pass: $(inputs[2]).val()}, function(data) {
                $(inputs[2]).addClass("border border-2");
                $("#errorPass").html(data);
                if (data !== "<span>Este campo no puede estar vacío</span>"
                    && data!== "<span class = 'text-danger'>La contraseña debe tener mínimo 8 caracteres</span>") {
                    errores[2] = false;
                    $(inputs[2]).removeClass("border-danger");
                    $(inputs[2]).addClass("border-success");
                } else {
                    $(inputs[2]).addClass("border-danger");
                    $(inputs[2]).removeClass("border-success");
                    errores[2] = false;
                }
            });

            //$("#errorPass").load("/hypefit/includes/ajax/validationRegistro.php", {pass: $(inputs[2]).val()});
            //errores[2] = $("#errorPass").text() === "<span>Este campo no puede estar vacío</span>"
              //  || $("#errorPass").text() === "<span class = 'text-danger'>La contraseña debe tener mínimo 8 caracteres</span>";
        });

        $(inputs[3]).keyup(function (){ //input password2
            modif=true;
            $(inputs[3]).addClass("border border-2");
            if( $(inputs[2]).val() ===  $(inputs[3]).val()){ //contraseñas iguales
                $(inputs[3]).removeClass('border-danger');
                $(inputs[3]).addClass('border-success');
                $("#errorPass2").text("");
                errores[3] = false;
            }
            else{ //Contraseñas distintas
                $(inputs[3]).removeClass('border-success');
                $(inputs[3]).addClass('border-danger');
                $("#errorPass2").text("Las contraseñas no coinciden");
                errores[3] = true;
            }
        });

        $(inputs[4]).change(function (){ //input rol
            modif=true;
            $(inputs[4]).addClass("border border-2");
            if($(inputs[4]).val() === "rol"){ //Selección por defecto no válida
                $(inputs[4]).removeClass('border-success');
                $(inputs[4]).addClass('border-danger');
                $("#errorRol").text("Elige un rol");
                errores[4] = true;
            }
            else{
                $(inputs[4]).removeClass('border-danger');
                $(inputs[4]).addClass('border-success');
                $("#errorRol").text("");
                errores[4] = false;
            }
        });

        $("#RegistroForm").submit(function(event){
            /*if(modif === false) {
                event.preventDefault();
                $("#errorSubmit").text("¡Rellena el formulario!");
                $("#nombreRegistro, #emailRegistro, #passwordRegistro, #password2Registro, #rolRegistro").addClass("border border-2 border-danger");
            }
            else{*/
                var hay_error = false;
                for(var i=0; i < errores.length; i++){
                    if(errores[i]){
                        hay_error = true;
                        $(inputs[i]).addClass("border border-2 border-danger");
                    }
                }
                if(hay_error){
                    event.preventDefault();
                    $("#errorSubmit").text("Revisa los campos erróneos");
                }

        });
    });