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
  <div class="col-md-12">
    <div class="tab">
      <button class="tablinks" onclick="changeTabs(event, 'create')" >Création épisode</button>
      <button class="tablinks" onclick="changeTabs(event, 'Paris')" id="defaultOpen">Modération épisode</button>
      <button class="tablinks" onclick="changeTabs(event, 'Tokyo')">Modération commentaire</button>
    </div>

    <div id="create" class="tabcontent">

      <div class="col-md-12 boxCreate">
        <div class="col-md-6">
          <div>
            <label for="username">Titre de l'épisode *</label>
            <input id="title" type="text" class="form-control" >
          </div>
        </div>

        <div class="col-md-6">
          <div>
            <label for="username">Date de création *</label>
            <input id="publication_date" type="text" class="form-control" >
          </div>
        </div>
      </div>

      <div class="col-md-12 boxCreate">
        <textarea id="text_episode" name="name" rows="8" cols="80">
        </textarea>
        <button onclick="createEpisode();" type="button" class="buttonCreateEpisode" name="button">Créer l'épisode</button>
      </div>

    </div>

    <div id="Paris" class="tabcontent">

      <div class="col-md-12">
        <div class="seanceBoxModification">
          <p>Nom de l'épisode - date de l'épisode</p>
          <p class="excerptEposide">Sed ut tum ad senem senex de senectute, sic hoc libro ad amicum amicissimus scripsi de amicitia. Tum est Cato locutus, quo erat nemo fere senior temporibus illis, nemo prudentior; nunc Laelius et sapiens (sic enim est habitus) et amicitiae gloria excellens de amicitia loquetur. Tu velim a me animum parumper avertas, Laelium loqui ipsum putes. C. Fannius et Q. Mucius ad socerum veniunt post mortem Africani; ab his sermo oritur, respondet Laelius, cuius tota disputatio est de amicitia, quam legens te ipse cognosces.</p>
        <p><button type="button" class="buttonEditEpisode"><i class="fa fa-indent" aria-hidden="true"></i> Modifier</button> <button class="buttonEditEpisode" type="button"><i class="fa fa-trash" aria-hidden="true"></i> Supprimer</button></p>
        </div>

      </div>

    </div>

    <div id="Tokyo" class="tabcontent">
      <h3>Tokyo</h3>
      <p>Tokyo is the capital of Japan.</p>
    </div>


  </div>
</div>


  <script src="./public/js/episode.js" ></script>
  <script src="https://cloud.tinymce.com/stable/tinymce.min.js?apiKey=sy88xqa0fgls5tyqp4otmi5kt8sjcwssu5c9ijoc53yjfr9n"></script>
  <script src="./public/js/tinymce.js"></script>
  <script src="./public/js/tabsOpen.js"></script>

    <?php $content = ob_get_clean(); ?>


    <?php require('./view/template.php'); ?>
