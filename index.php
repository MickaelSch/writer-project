<?php
require('./controller/MainController.php');

if (isset($_GET['page'])) {

  switch ($_GET['page']) {
    case 'home':
      MainController::showHomePage();
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
