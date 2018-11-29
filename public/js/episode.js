function createEpisode(){
  tinyMCE.triggerSave();
  $.post(
    "./ajax.php",
    {
      action : "Episode:create",
      title : $("#title").val(),
      publication_date : $("#publication_date").val(),
      text_episode : $("#text_episode").val()
    },

    function(data){
      data = JSON.parse(data);
      if(data.error){
        $(".episode_success").css("display", "none");
        $(".episode_error").css("display", "block");
        $(".episode_error").html(data.error_message);
      }else{
        $(".episode_error").css("display", "none");
        $(".episode_success").css("display", "block");
        $(".episode_success").html("L'épisode a bien été enregistré");
      }

    },
    "text",
  );
};
