<?php

class CommentModel {

public function create($content, $id_episode, $pseudo, $date){

  $db = $this->dbConnect();
  $request = $db->prepare("INSERT INTO comment (content, id_episode, pseudo, date) VALUES (:content, :id_episode, :pseudo, :date)");
  $request->execute(array(
    "content" => $content,
    "date" => $date,
    "id_episode" => $id_episode,
    "pseudo" => $pseudo
  ));
  $result = $request->fetch();
  return $result;

}

public function readAll(){

  $db = $this->dbConnect();
  $request = $db->prepare("SELECT * FROM comment");
  $request->execute();
  $comments = $request->fetchAll();
  return $comments;

}

public function reportComment($id){

  $db = $this->dbConnect();
  $request = $db->prepare("UPDATE comment SET report = '1' WHERE id = :id");
  $request->execute(array(
    "id" => $id
  ));
  return true;

}

private function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=writer-project;charset=utf8', 'root', '');
    return $db;
}

}
