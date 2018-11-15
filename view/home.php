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
  <h2 class="titleSection">Les épisodes</h2>
<div style="padding-top: 60px" class="container">
  <div class="col-md-12">

    <table id="myTable">
      <thead>
        <tr>
          <td></td>
        </tr>
      </thead>
      <tbody>
        <tr>
          <td><p class="title_episode">Nom de l'épisode</p></td>
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
      </tbody>
    </table>






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
