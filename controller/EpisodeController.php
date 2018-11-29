<?php


require("./model/EpisodeManager.php");


class EpisodeController{

  public static function create($data) {

    $episodeManager = new EpisodeManager();
    $episodeManager->create($data['title'], $data['publication_date'], $data['text_episode']);

  }

  public static function getAll(){

    $episodeManager = new EpisodeManager();
    $episodes = $episodeManager->getAll();
    return $episodes;

  }




}
