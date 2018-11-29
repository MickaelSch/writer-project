<?php


require("./model/EpisodeManager.php");


class EpisodeController{

  public static function create($data) {

    $date = date("YmdHis");

    // Check all input
    if (empty($data['title']) || empty($data['text_episode'])){
      return [
        "error" => true,
        "error_message" => "Tous les champs sont obligatoires"
      ];
    }

    $episodeManager = new EpisodeManager();
    $episodeManager->create($data['title'], $date, $data['text_episode']);
    return true;
  }

  public static function delete($data) {

    $episodeManager = new EpisodeManager();
    $episodeManager->delete($data['id']);
    return true;
  }

  public static function read($data) {

    $episodeManager = new EpisodeManager();
    $episode = $episodeManager->getEpisode($data['id']);
    return $episode;

  }

  public static function update($data) {

    $episodeManager = new EpisodeManager();
    $episode = $episodeManager->update($data['id'], $data['title'], $data['text_episode']);
    return $episode;

  }


  public static function getAll(){

    $episodeManager = new EpisodeManager();
    $episodes = $episodeManager->getAll();
    return $episodes;

  }




}
