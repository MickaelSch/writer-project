function signIn(){
  $("#signInButton").click(function(){
  $.post(
    "./ajax.php",
    {
      action : "User:signIn",
      pseudoSignIn : $("#pseudoSignIn").val(),
      passSignIn : $("#passSignIn").val()
    },

    function(data){
      console.log(data);
      data = JSON.parse(data);
      if(data.error){
        $(".signInError").css("display", "block");
        $(".signInError").html(data.error_message);
      }else{
        window.location.replace("./?page=admin");
      }

    },
    "text",
  );
});
}

function signUp(){
  $(".signUpButton").click(function(){
  $.post(
    "./ajax.php",
    {
      action : "User:signUp",
      pseudoSignUp : $("#pseudoSignUp").val(),
      passSignUp : $("#passSignUp").val(),
      passConfirmSignUp : $("#passConfirmSignUp").val(),
      emailSignUp : $("#emailSignUp").val()
    },

    function(data){
      console.log(data);
      data = JSON.parse(data);
      if(data.error){
        $(".signUpError").css("display", "block");
        $(".signUpError").html(data.error_message);
      }else{
        $(".signUpError").css("display", "none");
        $(".signUpSuccess").css("display", "block");
        $(".signUpSuccess").html("Votre inscription à bien été effectuée.");
      }

    },
    "text",
  );
});
}

function logOut(){
  $("#logOut").click(function(){
    console.log("f");
    $.post(
      "./ajax.php",
      {
        action : "User:logOut"
      },

      function(data){
        if(data){
          window.location.replace("./?page=home");
        }else{

        }
      },
      "text",
    );
  });
}

$(function() {

    $('.login-link').click(function(e) {
    $("#divLogin").delay(100).fadeIn(100);
 		$("#divRegistration").fadeOut(100);
		$('#divRegistration').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('.registration-link').click(function(e) {
		$("#divRegistration").delay(100).fadeIn(100);
 		$("#divLogin").fadeOut(100);
		$('#divLogin').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});

signIn();
signUp();
logOut();
