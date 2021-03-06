<?php ob_start(); ?>

<div id="acc">
  <?php
  if (isset($_COOKIE["session_token"])) {
    ?>
    <div class="boxConnection">
      <p>Vous êtes connecté : <span style="color: #30f451; font-weight: bold"><?php echo $user["pseudo"]; ?></span> - <a href="#">Changer le mot de passe</a> - <a id="logOut">Deconnexion</a></p>
    </div>
    <?php
  };
  ?>


  <div class="title_acc" >
    <h1 style="font-size: 50px">Billet simple pour l'Alaska</h1>
  </div>

  <div id="divLogin" class="active">
    <div style="display: flex">

      <div class="linkUser login-link">
        <p class="texteLogin">Connexion</p>
      </div>
      <div class="linkUser registration-link noBorder">
        <p class="texteLogin">Inscription</p>
      </div>
    </div>
    <p class="textLoginRegistration">Espace membre</p>
    <div class="row">
      <div class="col-md-6">
        <input class="form-control input-sm" type="text" id="pseudoSignIn" placeholder="Votre pseudo">
      </div>
      <div class="col-md-6">
        <input class="form-control input-sm" type="password" id="passSignIn" placeholder="Votre mot de passe">
      </div>
    </div>
    <div class="alert alert-danger signInError" role="alert"></div>
    <button id="signInButton" type="button" name="button">Valider</button>
  </div>

  <div id="divRegistration">
    <div style="display: flex">

      <div class="linkUser">
        <p class="texteLogin login-link">Connexion</p>
      </div>
      <div class="linkUser noBorder">
        <p class="texteLogin registration-link">Inscription</p>
      </div>
    </div>
    <p class="textLoginRegistration">Espace membre</p>
    <div class="row">
      <div class="col-md-6">
        <input class="form-control input-sm" type="text" id="pseudoSignUp" placeholder="Votre pseudo">
      </div>
      <div class="col-md-6">
        <input class="form-control input-sm" type="text" id="emailSignUp" placeholder="Votre email">
      </div>
    </div>
    <div style="margin-top: 20px" class="row">
      <div class="col-md-6">
        <input class="form-control input-sm" type="password" id="passSignUp" placeholder="Votre mot de passe">
      </div>
      <div class="col-md-6">
        <input class="form-control input-sm" type="password" id="passConfirmSignUp" placeholder="Confirmer mot de passe">
      </div>
    </div>
    <div class="alert alert-success signUpSuccess" role="alert"></div>
    <div class="alert alert-danger signUpError" role="alert"></div>
    <button id="signUp" class="signUpButton" type="button" name="button">Valider</button>
  </div>


</div>

<?php $header = ob_get_clean(); ?>

<?php ob_start(); ?>

<div style="padding: 60px 0px;" class="container">
  <h2 class="titleSection">Les épisodes</h2>
  <div class="col-md-12">

    <table id="listEpisodes" style="width: 100%;">
      <thead>
        <tr>
          <th> </th>
          <th> </th>
          <th> </th>
          <th> </th>
        </tr>
      </thead>
      <tbody>
        <?php
        foreach ($episodes as $episode) {
          ?>
          <tr>
            <td><p class="title_episode"><span class="colorRed"><?php echo $episode["title"]; ?></span></p></td>
            <td style="padding: 10px 80px;"><?php echo $episode["text_episode"]; ?>
              <p class="id_episode" style="display: none"><?php echo $episode["id"]; ?></p>
            </td>
            <td><p id="comment" class="commentText comments"><i class="fa fa-comments commentIcon" aria-hidden="true"></i>Commentaires</p></td>
            <td>
              <div style="display: none" class="commentBox">
                <div class="addComment">
                  <input class="form-control input-sm pseudoInput" type="text" placeholder="Votre pseudo">
                  <textarea class="content" name="name" rows="3" cols="140" placeholder="Ecrivez votre commentaire ..."></textarea>
                </div>
                <button class="addCommentButton" type="button" name="button">Ajouter</button>
                <?php
                foreach ($comments as $comment) {
                  for ($i= $episode["id"]; $i === $comment["id_episode"]; $i++) {

                    ?>
                    <div class="comment">
                      <p class="autorComment"><?php echo $comment["pseudo"]; ?> - <?php echo date('d-m-Y', strtotime($comment["date"])); ?></p>
                      <p class="textComment"><?php echo $comment["content"]; ?></p>
                      <p data-episode-id="<?php echo $comment["id"]; ?>" class="reportComment"><i class="fa fa-exclamation-circle" aria-hidden="true"></i> Signaler le commentaire</p>
                    </div>
                    <?php
                  };
                };
                ?>
                <div class="newComment">
                  <p class="autorComment"><span class="newCommentPseudo"></span> - <span class="newCommentDate"></span></p>
                  <p class="newTextComment"></p>
                </div>
              </div>
            </td>

          </tr>
          <?php
        };
        ?>
      </tbody>
    </table>

  </div>
</div>


<div id="info_autor" class="container-fluid" >
  <h2 class="titleSection">à propos de l'auteur</h2>
  <div style="margin-top: 30px;" class="container">
    <div class="row">
      <div class="col-md-5">
        <img style="width: 100%;" src="./public/images/autor.jpeg" alt="">
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

  </div>




  <?php $content = ob_get_clean(); ?>


  <?php require('./view/template.php'); ?>
