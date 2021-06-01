    $(document).ready(function(){
        var modif = false;
        //  errores = [User, Email, Pass, Pass2, Rol]
        var errores = [true, true, true, true, true];
        var inputs = ["#nombreRegistro", "#emailRegistro", "#passwordRegistro", "#password2Registro", "#rolRegistro"]

        $(inputs[0]).keyup(function(){ //input nombre
            modif=true;
            errores[0] = ($("#errorUser").load("/hypefit/includes/validation.php", {user: $(inputs[0]).val()}).val().length > 0);
        });

        $(inputs[1]).keyup(function(){ //input email
            modif=true;
            errores[1] = $("#errorEmail").load("/hypefit/includes/validation.php", {email: $(inputs[1]).val()}).val().length > 0;
        });

        $(inputs[2]).keyup(function (){//input password
            modif=true;
            errores[2] = $("#errorPass").load("/hypefit/includes/validation.php", {pass: $(inputs[2]).val()}).val().length > 0;
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
            if(modif === false) {
                event.preventDefault();
                $("#errorSubmit").text("¡Rellena el formulario!");
                $("#nombreRegistro, #emailRegistro, #passwordRegistro, #password2Registro, #rolRegistro").addClass("border border-2 border-danger");
            }
            else{
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
            }
            //modif = false;
        });
    });