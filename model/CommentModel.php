<?php

class CommentModel {

public function create($content, $id_episode, $date){

  $db = $this->dbConnect();
  $request = $db->prepare("INSERT INTO comment (content, id_episode, date) VALUES (:content, :id_episode, :date)");
  $request->execute(array(
    "content" => $content,
    "date" => $date,
    "id_episode" => $id_episode
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

private function dbConnect()
{
    $db = new PDO('mysql:host=localhost;dbname=writer-project;charset=utf8', 'root', '');
    return $db;
}

}
