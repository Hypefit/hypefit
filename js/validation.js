    function correoValido(email){
        var EmailRegex = /^([a-zA-Z0-9_.]+)@([a-zA-Z0-9])+.([a-z]+)(.[a-z]+)?$/;
        return  EmailRegex.test(email);
    }

    $(document).ready(function(){
        var is_userValid=false;
        var is_userEmpty=true;

        //correo: [empty, valid, available]
        var correo = [true, false, false];

        $("#emailRegistro").change(function(){
            /*if (correoValido($("#emailRegistro").val())) {
                correo[1]=true; correo[0]=false; //valido y no vacío
            } else {
                correo[1] = false; //no válido
                if($("#emailRegistro").val() === "")
                    correo[0]=true; //vacío
                else
                    correo[0]=false; //no vacío
            }*/
           $("#errorEmail").load("/hypefit/includes/validation.php", {email: $("#emailRegistro").val()});

            /*$.ajax({
                url: "/hypefit/includes/validation.php",
                type: "POST",
                data: {email: $("#emailRegistro").val()},
                success:
            });*/
            /*var url= "../includes/validation.php?email=" + $("#emailRegistro").val();
            $.get(url,function(data) {
                if (data === "disponible") {
                    correo[2]=true; //disponible
                } else if (data === "existe") {
                    correo[2]=false; //no disponible
                }
            });
            if(correo[0] || !correo[1] || !correo[2]){
                $("#emailRegistro").addClass("border-danger");
                if(correo[0]) $("#errorEmail").text("");
                else if(!correo[1]) $("#errorEmail").text("Correo no válido");
                else if(!correo[2]) $("#errorEmail").text("Correo no disponible");
            }
            else{
                $("#emailRegistro").removeClass("border-danger");
                $("#errorEmail").text("");
            }*/
        });

        $("#nombreRegistro").change(function(){
            var url="comprobarUsuario.php?user=" + $("#nombreRegistro").val();
            $.get(url,function(data){
                if(data === "disponible"){
                    $("#nombreRegistro").removeClass("border-danger");
                    $("#errorUser").text("");
                    is_userValid=true;
                }
                else if(data === "existe"){
                    $("#nombreRegistro").addClass("border-danger");
                    $("#errorUser").text("Nombre de usuario no disponible");
                    is_userValid=false;
                }
                else if (data==="userNotSet") {
                    is_userEmpty = true;
                }
            });
        });

        $("#formRegistro").on('submit', function(event){
            event.preventDefault();

            $defaultVacio= "Este campo no puede estar vacío";
            if(correo[0] || !correo[1]|| !correo[2] || !is_userValid) {
                if(correo[0])
                    $("#errorEmail").text($defaultVacio);

                if(is_userEmpty)
                    $("#errorUser").text($defaultVacio);

            }
        });
    });