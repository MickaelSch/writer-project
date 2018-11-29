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

    },
    "text",
  );
};
