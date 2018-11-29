<?php

require("./controller/EpisodeController.php");

class MainController{

  public static function showHomePage(){
    $episodes = EpisodeController::getAll();
    require("./view/home.php");
  }

  public static function showAdminPage(){
    require("./view/admin.php");
  }

}


?>
