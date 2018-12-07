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

function create(){
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
        $(".newComment .newTextComment").html(data.content);
        $(".newComment .newCommentDate").html(data.date);
        $(".newComment .newCommentPseudo").html(data.pseudo);

      }else{

      }
    },
    "text",
  );

});
}

function deleteComment(){
  $(".deleteComment").click(function(e){
    var id_comment = e.target.getAttribute("data-comment-id");
    $.post(
      "./ajax.php",
      {
        action : "Comment:delete",
        id : id_comment
      },

      function(data){
        if(data){
          $("div[data-comment-id ="+id_comment+"]").css("display", "none");
        }else{

        }
      },
      "text",
    );
  });
}

function report(){
$(".reportComment").click(function(e){
  var id_episode = e.target.getAttribute("data-episode-id");
  console.dir(id_episode)
  $.post(
    "./ajax",
    {
      action : "Comment:reportComment",
      id : id_episode
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
}

create();
report();
deleteComment();
