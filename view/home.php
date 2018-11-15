<?php ob_start(); ?>

<div id="acc">
  <div class="title_acc" >
    <h1 style="font-size: 50px">Billet simple pour l'Alaska</h1>
  </div>

  <div id="divLogin">
    <p class="texteLogin">Connexion à l'espace membre</p>
    <div class="col-md-6">
      <input class="form-control input-sm" type="text" name="" value="Votre email">
    </div>
    <div class="col-md-6">
      <input class="form-control input-sm" type="text" name="" value="Votre mot de passe">
    </div>
    <button type="button" name="button">Connexion</button>
  </div>


</div>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<div style="padding: 60px 0px;" class="container">
  <h2 class="titleSection">Les épisodes</h2>
  <div class="col-md-12">

    <table id="myTable">
      <thead>
        <tr>
          <td></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><p class="title_episode">Nom de l'épisode :</p></td>
        </tr>
        <tr>
          <td><p class="informations_episode">Date de publication :</p></td>
        </tr>
        <tr>
          <td><p>Iamque non umbratis fallaciis res agebatur, sed qua palatium est extra muros,
            armatis omne circumdedit. ingressusque obscuro iam die, ablatis regiis indumentis
            Caesarem tunica texit et paludamento communi, eum post haec nihil passurum velu
            t mandato principis iurandi crebritate confirmans et statim inquit exsurge et
            inopinum carpento privato inpositum ad Histriam duxit prope oppidum Polam, ubi
            quondam peremptum Constantini filium accepimus Crispum.</p>
          </td>
        </tr>
        <tr>
          <td><p id="comment" class="commentText"><i class="fa fa-comments commentIcon" aria-hidden="true"></i>Commentaires</p>
          </td>
        </tr>
        <tr>
          <td>
            <div style="display: none" class="commentBox">
              <div class="addComment">
                <textarea name="name" rows="3" cols="140" placeholder="Ecrivez votre commentaire ..."></textarea>
              </div>
              <div class="comment">
                <p class="autorComment">Mickael Schimpf - 15/11/2018</p>
                <p class="textComment">Très bon épisode </p>
              </div>
            </div>
          </td>
        </tr>
      </tbody>
    </table>

  </div>
</div>

<script>

$(document).ready(function() {
  $("#comment").click(function(){
  var value = $(".commentBox").is(":visible");
    if(value == true){
      $(".commentBox").css("display", "none");
    }else{
      $(".commentBox").css("display", "block");
    }
  });
});



</script>



<div id="info_autor" class="container-fluid" >
  <h2 class="titleSection">à propos de l'auteur</h2>
  <div style="margin-top: 30px;" class="container">
    <div class="col-md-5">
      <img style="width: 100%;" src="../public/images/autor.jpeg" alt="">
    </div>
    <div class="col-md-6">
      <h3 class="autorName">Jean Forteroche</h3>
      <p>Né en 1969 à Rennes, Loïc Le Borgne a été durant 17 ans journaliste dans un quotidien de presse régionale, dans l'ouest de la France.<br>
        Il vit dans la Sarthe. Marié, père de deux filles, il a écrit plusieurs romans toujours ancrés dans la littérature imaginaire (science-fiction, fantastique, thriller).<br>
        Ses thèmes de prédilection : l'écologie, les énigmes scientifiques, l'aventure, les voyages. Il a effectué ses études à Rennes,
        sa ville natale, puis suivi des cursus universitaires en physique et biologie,
        avant d'obtenir un DEUG d'histoire-géographie et une maîtrise d'information-communication.</p>
      </div>

    </div>

  </div>

  <script>
  $(document).ready( function () {
    $('#myTable').DataTable({
      "pagingType": "simple",
      "bLengthChange": false,
      "searching": false,
      "bInfo" : false,
      "ordering" : false
    });
  } );
  </script>

  <?php $content = ob_get_clean(); ?>


  <?php require('./template.php'); ?>
