<?php

require("./model/CommentModel.php");


class CommentController{

  public static function create($data){

    $date = date("d/m/Y");

    $comment = new CommentModel();
    $create = $comment->create($data["content"], $data["id_episode"], $data["pseudo"], $date);
    return [
      "create" => true,
      "content" => $data["content"],
      "date" => $date,
      "pseudo" => $data["pseudo"]
    ];

  }

  public static function reportComment($data){

    $comment = new CommentModel();
    $report = $comment->reportComment($data["id"]);
    return true;

  }

  public static function readAll(){

    $comment = new CommentModel();
    $comments = $comment->readAll();
    return $comments;



  }


}
