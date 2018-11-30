function signIn(){
  $.post(
    "./ajax.php",
    {
      action : "User:signIn",
      pseudo : $("#pseudo").val(),
      pass : $("#pass").val()
    },

    function(data){
      console.log(data);
      data = JSON.parse(data);
      if(data){

      }else{

      }

    },
    "text",
  );


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
