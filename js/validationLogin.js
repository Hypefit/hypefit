$(document).ready(function(){
    $("#LoginForm").submit(function(event){

        event.preventDefault();
        $.post("includes/ajax/validationLogin.php", {email: $("#emailLogin").val(), pass: $("#passwordLogin").val()}, function(data) {
            if (data !== "") {
                $("#errorLogin").html(data);
            }
            else {
                event.currentTarget.submit();
            }
        });
    });
});