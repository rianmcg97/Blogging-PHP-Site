/*
Author: Pradeep Khodke
URL: http://www.codingcage.com/
*/

$(document).ready(function()
{   
     /* validation */
	 $("#login-form").validate({
      rules:
	  {
			Password: {
			required: true
			},
			Email: {
            required: true,
            Email: true
            }
	   },
       messages:
	   {
            Password:{
                      required: "please enter your password"
                     },
            Email: {
                      required: "please enter your email address"
                  }
       },
	   submitHandler: submitForm()	
       });  
	   /* validation */
	   
	   /* login submit */
	   function submitForm()
	   {		
               
			var Email = $("#Email").val();
			var Password = $("#Password").val();
			var btnLogin = $("#btn-login").val();
                        
			$.ajax({
				
			type : 'POST',
			url  : 'login_process.php',
			data : {'Email' : Email, 'Password': Password, 'btn-login': btnLogin},
			beforeSend: function()
			{	
				$("#error").fadeOut();
				$("#btn-login").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
			},
			success :  function(response)
			   {				
                               
					if(response=="ok"){
									
						$("#btn-login").html('<img src="images/btn-ajax-loader.gif" /> &nbsp; Signing In ...');
						setTimeout(' window.location.href = "home.php"; ',1000000);
					}
					else{
									
						$("#error").fadeIn(1000, function(){						
				$("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+response+' !</div>');
											$("#btn-login").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Sign In');
									});
					}
			  }
			});
				return false;
		}
	   /* login submit */
});