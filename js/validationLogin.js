async function foo(event) {
    var error = await $("#errorLogin").load("/hypefit/includes/validationLogin.php", {
        email: $("#emailLogin").val(),
        pass: $("#passwordLogin").val()
    }).text();
    console.log(error);
    if(error !== "") event.preventDefault();
}
$(document).ready(function(){
    $("#LoginForm").submit(function(event){

        foo(event);

        /*$("#errorLogin").load("/hypefit/includes/validationLogin.php", {
            email: $("#emailLogin").val(),
            pass: $("#passwordLogin").val()
        }).text();*/
       /*setTimeout(function () {
           if ($("#errorLogin").text() !== "")
               event.preventDefault();
           }, 2000);*/
    });
});