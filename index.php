<?php
require('./controller/MainController.php');
require('./config.php');

if (isset($_GET['page'])) {

  switch ($_GET['page']) {
    case 'home':
      MainController::showHomePage();
      MainController::showCommentHomePage();
      break;
    case 'admin':
      MainController::showAdminPage();
      break;
    default:
      // 404
      break;
  }
}else{
  MainController::showHomePage();
}
