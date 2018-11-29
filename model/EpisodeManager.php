<?php
class EpisodeManager{

    public function create($title, $publication_date, $text_episode){

      $db = $this->dbConnect();
      $request = $db->prepare("INSERT INTO episode (title, publication_date, text_episode, enable) VALUES(:title, :publication_date, :text_episode, :enable)");
      $request->execute(array(
        "title" => $title,
        "publication_date" => $publication_date,
        "text_episode" => $text_episode,
        "enable" => 1
      ));

    }

    public function getAll(){

      $db = $this->dbConnect();
      $request = $db->prepare("SELECT * FROM episode");
      $request->execute();
      $episodes = $request->fetchAll();
      return $episodes;

    }

    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=writer-project;charset=utf8', 'root', '');
        return $db;
    }
}
