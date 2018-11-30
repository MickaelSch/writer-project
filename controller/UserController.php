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

    $userModel = new UserModel();
    $result = $userModel->signIn($data['pseudo']);

  }

}
