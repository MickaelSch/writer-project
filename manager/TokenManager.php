<?php
require("./config.php");

class TokenManager{

  public static function create($id) {
    global $CONFIG;

    // le user_id devrait être issus du login
    $user_id=$id;
    // la clef secrete (grain de sable) et la durée de validité devraient être stockés
    // dans un fichier de configuration
    $secret_key= $CONFIG['token_secret'];
    $validity_time= $CONFIG['token_validity_time'];
    // le jeton est composé de la clef secrète, de l'url du service et du user-agent
    $token_clair=$secret_key.$_SERVER['HTTP_HOST'].$_SERVER['HTTP_USER_AGENT'];
    // les informations (ici: id de l'utilisateur et la date de création du jeton)
    // vont être transmis en clair dans un cookie  et ajouté au jeton pour être signé.
    // On pourra ainsi s'assurer de leur authenticité.
    $informations= time()."-".$user_id;
    // On encode le jeton
    $token = hash('sha256', $token_clair.$informations);

    // On poste les cookies
    setcookie("session_token", $token, time()+$validity_time);
    setcookie("session_informations", $informations, time()+$validity_time);

  }

  public static function verify() {
    global $CONFIG;

    // bis repetita, à mettre dans un fichier de configuration
    $secret_key= $CONFIG['token_secret'];
    $validity_time= $CONFIG['token_validity_time'];

    // ici, on doit renouveller le cookie en générant un jeton actualité (notament l'heure et url)
    // on calcul le token prédictible, sauf la clef secrete connue du serveur uniquement
    $token_clair= $secret_key.$_SERVER['HTTP_HOST'].$_SERVER['HTTP_USER_AGENT'];
    //on recrypte avec les informations transmises dans le cookie en clair
    $token = hash('sha256', $token_clair.$_COOKIE["session_informations"]);

    //On compare le hash calculé avec le hash passé en cookie
    if(strcmp($_COOKIE["session_token"], $token)==0)
    {
      $session_information = explode("-",$_COOKIE["session_informations"]);
      $id_user = $session_information[1];
      return $id_user;
    }else{
      return false;
    }

  }


}
