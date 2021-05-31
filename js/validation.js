    $(document).ready(function(){
        var modif = false;

        $("#nombreRegistro").keyup(function(){
            modif=true;
            $("#errorUser").load("/hypefit/includes/validation.php", {user: $("#nombreRegistro").val()});
        });

        $("#emailRegistro").keyup(function(){
            modif=true;
            $("#errorEmail").load("/hypefit/includes/validation.php", {email: $("#emailRegistro").val()});
        });

        $("#passwordRegistro").keyup(function (){
            modif=true;
           $("#errorPass").load("/hypefit/includes/validation.php", {pass: $("#passwordRegistro").val()});
        });

        $("#password2Registro").keyup(function (){
            modif=true;
            $("#password2Registro").addClass("border border-2");
            if( $("#passwordRegistro").val() ===  $("#password2Registro").val()){
                $("#password2Registro").removeClass('border-danger');
                $("#password2Registro").addClass('border-success');
                $("#errorPass2").text("");
            }
            else{
                $("#password2Registro").removeClass('border-success');
                $("#password2Registro").addClass('border-danger');
                $("#errorPass2").text("Las contraseñas no coinciden");
            }
        });
        $("#rolRegistro").change(function (){
            modif=true;
            $("#rolRegistro").addClass("border border-2");
            if($("#rolRegistro").val() === "rol"){
                $("#rolRegistro").removeClass('border-success');
                $("#rolRegistro").addClass('border-danger');
                $("#errorRol").text("Elige un rol");
            }
            else{
                $("#rolRegistro").removeClass('border-danger');
                $("#rolRegistro").addClass('border-success');
                $("#errorRol").text("");
            }
            //$("#errorRol").load("/hypefit/includes/validation.php", {rol: $("#rolRegistro").val()});
        });

        $("#RegistroForm").on('submit', function(event){
            event.preventDefault();
            var error= "Revisa los campos erróneos";
            if(modif===false) {
                $("#errorSubmit").text("!Rellena el formulario!");
                $("#nombreRegistro, #emailRegistro, #passwordRegistro, #password2Registro, #rolRegistro").addClass("border-danger");
            }
            else if($("#errorUser").val() !== ""){
                $("#errorSubmit").text(error);
            }
            else if($("#errorEmail").val() !== ""){
                $("#errorSubmit").text(error);
            }
        });
    });