$(document).ready(function() {
  $(".comments").click(function(){
    var value = $(".commentBox").is(":visible");
    if(value == true){
      $(".commentBox").css("display", "none");
    }else{
      $(".commentBox").css("display", "block");
    }

    $.post(
      "./ajax.php",
      {
        action : "Comment:read",
        id : $("#id_episode").val()
      },

      function(data){
        console.log(data);
        data = JSON.parse(data);
        if(data){
          console.log("a");
        }else{
          console.log("b");
        }

      },
      "text",
    );
  });
});

$(".addCommentButton").click(function(){
  $.post(
    "./ajax",
    {
      action : "Comment:create",
      id_episode : $(".id_episode").text(),
      pseudo : $(".pseudoInput").val(),
      content : $(".content").val()
    },

    function(data){
      data = JSON.parse(data);
      console.log(data);
      if(data.create){
        $(".newComment").css("display", "block");
        $(".newComment .textComment").html(data.content);
      }else{

      }
    },
    "text",
  );

});

$(".reportComment").click(function(){
  console.log($(".idComment").text());
  $.post(
    "./ajax",
    {
      action : "Comment:reportComment",
      id : $(".idComment").text()
    },

    function(data){
      data = JSON.parse(data);
      console.log(data);
      if(data){
        console.log(data);
      }else{

      }
    },
    "text",
  );

});
