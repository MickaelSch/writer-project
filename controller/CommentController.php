<?php

require("./model/CommentModel.php");


class CommentController{

  public static function create($data){

    $date = date("d/m/Y");

    $comment = new CommentModel();
    $create = $comment->create($data["content"], $data["id_episode"], $date);
    return [
      "create" => true,
      "content" => $data["content"]
    ];

  }

  public static function readAll(){

    $comment = new CommentModel();
    $comments = $comment->readAll();
    return $comments;



  }


}
