<?php

if(isset($_POST['action'])){
  $actionData = explode(":",$_POST['action']);
  $controller = $actionData[0]."Controller";
  $controllerClass = ucfirst($controller);
  $method = $actionData[1];
  require("./controller/".$controller.".php");
  $result = $controllerClass::$method($_POST);
  echo json_encode($result);
}
