const sleep = (delay) => new Promise((resolve) => setTimeout(resolve, delay));

async function foo(event) {
    //event.preventDefault();
     $("#errorLogin").load("/hypefit/includes/AJAX/validationLogin.php", {
        email: $("#emailLogin").val(),
        pass: $("#passwordLogin").val()
    });
    await sleep(1000);
    console.log($("#errorLogin").text());
    if($("#errorLogin").text() === "") {
        event.preventDefault();
        console.log("Dentro");
    }
}

$(document).ready(function(){
    $("#LoginForm").submit(function(event){

        foo(event);

        //event.preventDefault();

        /*$.ajax({
            url: "/hypefit/includes/validationLogin.php",
            type: "POST",
            data: { email: $("#emailLogin").val(),
                pass: $("#passwordLogin").val(),
            },
            //dataType: "html",
            //cache: false,
            beforeSend: function() {
                console.log("Processing...");
            },
            success:
                function(data){
                    if(data !== ""){
                        event.preventDefault();
                        $("#errorLogin").text(data);
                    }
                    else{
                        window.location.href = "http://localhost/MyApp/loginFail.php";
                    }
                }

        });*/


        /*$("#errorLogin").load("/hypefit/includes/validationLogin.php", {
            email: $("#emailLogin").val(),
            pass: $("#passwordLogin").val()
        });
       setTimeout(function () {
           if ($("#errorLogin").text() !== "")
               event.preventDefault();
           }, 3000);*/
    });
});