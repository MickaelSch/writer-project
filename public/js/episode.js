function createEpisode(){
  tinyMCE.triggerSave();
  $.post(
    "./ajax.php",
    {
      action : "Episode:create",
      title : $("#title").val(),
      text_episode : $("#text_episode").val()
    },

    function(data){
      data = JSON.parse(data);
      if(data.error){
        $(".createSuccess").css("display", "none");
        $(".createError").css("display", "block");
        $(".createError").html(data.error_message);
      }else{
        $(".createError").css("display", "none");
        $(".createSuccess").css("display", "block");
        $(".createSuccess").html("L'épisode a bien été enregistré");
      }

    },
    "text",
  );
};

function deleteEpisode(id){
  $.post(
    "./ajax.php",
    {
      action : "Episode:delete",
      id : id
    },

    function(data){
      data = JSON.parse(data);
      if(data){
        $("#"+id).css("display", "none").delay(2000);
        console.log("supp");
      }else{
        console.log(" pas supp");
      }

    },
    "text",
  );
};

function updateEpisode(id){
  tinyMCE.triggerSave();
  $.post(
    "./ajax.php",
    {
      action : "Episode:update",
      id : id,
      title : $("#update_title").val(),
      text_episode : $("#update_text_episode").val()
    },

    function(data){
      data = JSON.parse(data);
      if(data){
        $(".updateSuccess").css("display", "block");
        $(".updateSuccess").html("L'épisode a bien été enregistré");
      }else{
        $(".updateError").css("display", "block");
        $(".createSuccess").html("Une erreur est survenue, veuillez ressayer");
      }

    },
    "text",
  );
};

function displayUpdateEpisode(id){
  $("#updateBox").css("display", "block");
  $.post(
    "./ajax.php",
    {
      action : "Episode:read",
      id : id
    },

    function(data){
      data = JSON.parse(data);
      if(data){
        $("#update_title").val(data["title"]);
        $("#buttonUpdate").click(function(){
          updateEpisode(data["id"]);
        })
        $("#update_id").val(data["id"]);
        tinyMCE.execCommand('mceInsertContent',false,data["text_episode"]);
      }else{

      }

    },
    "text",
  );

};
