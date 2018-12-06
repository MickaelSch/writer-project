<?php

require("./manager/TokenManager.php");
require("./model/UserModel.php");

class UserController{

  public static function signIn($data) {

    $userModel = new UserModel();
    $result = $userModel->readByPseudo($data['pseudoSignIn']);


    $isPasswordCorrect = password_verify($data['passSignIn'], $result['pass']);

    if ($isPasswordCorrect)
    {
      $token = TokenManager::create($result['id']);
      return true;
    }
    else
    {
      return [
        "error" => true,
        "error_message" => "Identifiant ou mot de passe incorrect"
      ];
    }
  }

  public static function signUp($data) {

    // Check all input
    if (empty($data['pseudoSignUp']) || empty($data['emailSignUp']) || empty($data['passSignUp']) || empty($data['passConfirmSignUp'])){
      return [
        "error" => true,
        "error_message" => "Tous les champs sont obligatoires"
      ];
    }

    // Matching pass
    if ($data['passSignUp'] !== $data['passConfirmSignUp']){
      return [
        "error" => true,
        "error_message" => "Les deux mot de passe ne correspondent pas"
      ];
    }

    // Check if the email is valid
    if(!preg_match('#^(([a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+\.?)*[a-z0-9!\#$%&\\\'*+/=?^_`{|}~-]+)@(([a-z0-9-_]+\.?)*[a-z0-9-_]+)\.[a-z]{2,}$#i',$data['emailSignUp'])){
      return [
        "error" => true,
        "error_message" => "L'email n'est pas valide"
      ];
    }

    $pass_hash = password_hash($data['passSignUp'], PASSWORD_DEFAULT);
    $user_registered = date("d/m/Y");

    $userModel = new UserModel();
    $result = $userModel->create($data['pseudoSignUp'], $data['emailSignUp'], $pass_hash, $user_registered);
    return true;
  }

  public static function logOut(){
    unset($_COOKIE["session_token"]);
    unset($_COOKIE["session_informations"]);
    setcookie('session_token', null, -1);
    setcookie('session_informations', null, -1);
    return true;

  }



}
