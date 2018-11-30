<?php

require("./model/UserModel.php");

class UserController{

  public static function signIn($data) {

    $userModel = new UserModel();
    $result = $userModel->signIn($data['pseudo']);


    $isPasswordCorrect = password_verify($data['pass'], $result['pass']);

    if ($isPasswordCorrect)
    {
      return true;
    }
    else
    {
      return false;
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

    $userModel = new UserModel();
    $result = $userModel->signIn();

  }



}
