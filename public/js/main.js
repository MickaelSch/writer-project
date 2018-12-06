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


function showNotif(){




}

showNotif();
