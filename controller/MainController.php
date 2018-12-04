<?php

require("./controller/EpisodeController.php");
require("./model/UserModel.php");
require("./manager/TokenManager.php");


class MainController{

  public static function showHomePage(){
    $episodes = EpisodeController::getAll();
    require("./view/home.php");
  }

  public static function showAdminPage(){
    $user = self::verifyToken();
    $episodes = EpisodeController::getAll();
    require("./view/admin.php");
  }

  private static function verifyToken(){
    $user_id = TokenManager::verify();
    if(!$user_id)
    {
      header("Location: ../auth.php");
      return false;
    }

    $userModel = new UserModel();    
    $user = $userModel->read($user_id);
    return $user;

  }

}


?>
