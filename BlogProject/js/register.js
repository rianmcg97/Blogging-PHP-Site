$(document).ready(function() {
    $(":text").dblclick(function () {
      $(this).val("");   
    });
    $("#register").click(function() {
        var username = $("#username").val();
        var email = $("#email").val();
        var password1 = $("#password1").val();
        var password2 = $("#password2").val();
        var isValid = true;
           
        if(username == "") {
            $("#username").next().text("You must enter a username");
            isValid = false;
        }else {
            $("#name").next().text("");
                       
        }
        
        if(email == "") {
            $("#email").next().text("You must enter an email address");
            isValid = false;
        }else {
            $("#email").next().text("");
        }
        
        if(password1 == "") {
            $("#password1").next().text("You must enter a password");
            isValid = false;
        }else {
            $("#password1").next().text("");
        }
        
        if(password2 == "") {
            $("#password2").next().text("You must confirm your password");
            isValid = false;
        }else {
            $("#password2").next().text("");
        }if(password1 != password2) {
                $("#password2").next().text("Your passwords must match");
                isValid = false;
            }
             else {
                 $("#password2").next().text("");
             }
        
        if(isValid == true) {
            $("#register_user").submit();
        }
    });
});
