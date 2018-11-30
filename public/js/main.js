function paginationEpisodes(id){
  $(id).DataTable({
    "pagingType": "simple",
    "bLengthChange": false,
    "searching": false,
    "bInfo" : false,
    "ordering" : false,
    "pageLength": 1
  });

}

paginationEpisodes('#listEpisodes');

$(document).ready(function() {
  $(".comments").click(function(){
    var value = $(".commentBox").is(":visible");
    if(value == true){
      $(".commentBox").css("display", "none");
    }else{
      $(".commentBox").css("display", "block");
    }
  });
});
