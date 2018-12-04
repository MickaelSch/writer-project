<?php

class UserModel{

public function read($id){

  $db = $this-dbConnect();
  $request = $db->prepare("SELECT * FROM user WHERE id = :id");
  $request->execute(array(
    "id" => $id
  ));
  $result = $request->fetch();
  return $result;

}

public function readByPseudo($pseudo){

  $db = $this->dbConnect();
  $request = $db->prepare("SELECT * FROM user WHERE pseudo = :pseudo");
  $request->execute(array(
    "pseudo" => $pseudo
  ));
  $result = $request->fetch();
  return $result;

}

public function create($pseudo, $email, $pass_hash, $user_registered){
  $db = $this->dbConnect();
  $request = $db->prepare("INSERT INTO user (pseudo, email, pass, user_registered) VALUES (:pseudo, :email, :pass, :user_registered)");
  $request->execute(array(
    "pseudo" => $pseudo,
    "email" => $email,
    "pass" => $pass_hash,
    "user_registered" => $user_registered
  ));
}

private function dbConnect(){
    $db = new PDO('mysql:host=localhost;dbname=writer-project;charset=utf8', 'root', '');
    return $db;
}

}
