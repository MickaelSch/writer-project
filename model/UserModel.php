<?php

class UserModel{

public function signIn($pseudo){

  $db = $this->dbConnect();
  $request = $db->prepare("SELECT id, pass FROM user WHERE pseudo = :pseudo");
  $request->execute(array(
    "pseudo" => $pseudo
  ));
  $result = $request->fetch();
  return $result;

}

private function dbConnect(){
    $db = new PDO('mysql:host=localhost;dbname=writer-project;charset=utf8', 'root', '');
    return $db;
}

}
