<?php


require("./model/EpisodeManager.php");


class EpisodeController{

  public static function create($data) {

    // Check all input
    if (empty($data['title']) || empty($data['publication_date']) || empty($data['text_episode'])){
      return [
        "error" => true,
        "error_message" => "Tous les champs sont obligatoires"
      ];
    }

    $episodeManager = new EpisodeManager();
    $episodeManager->create($data['title'], $data['publication_date'], $data['text_episode']);
    return true;
  }

  public static function getAll(){

    $episodeManager = new EpisodeManager();
    $episodes = $episodeManager->getAll();
    return $episodes;

  }




}
