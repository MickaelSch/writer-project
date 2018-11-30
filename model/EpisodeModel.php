<?php
class EpisodeModel{

    public function create($title, $date, $text_episode){

      $db = $this->dbConnect();
      $request = $db->prepare("INSERT INTO episode (title, publication_date, text_episode, enable) VALUES(:title, :publication_date, :text_episode, :enable)");
      $request->execute(array(
        "title" => $title,
        "publication_date" => $date,
        "text_episode" => $text_episode,
        "enable" => 1
      ));

    }

    public function delete($id){

      $db = $this->dbConnect();
      $request = $db->prepare("DELETE FROM episode WHERE id = :id ");
      $request->execute(array(
        "id" => $id
      ));

    }

    public function update($id, $title, $text_episode){

      $db = $this->dbConnect();
      $request = $db->prepare("UPDATE episode SET title = :title, text_episode = :text_episode WHERE id = :id");
      $request->execute(array(
        "id" => $id,
        "title" => $title,
        "text_episode" => $text_episode
      ));
      return true;

    }

    public function getAll(){

      $db = $this->dbConnect();
      $request = $db->prepare("SELECT * FROM episode");
      $request->execute();
      $episodes = $request->fetchAll();
      return $episodes;

    }

    public function getEpisode($id){

      $db = $this->dbConnect();
      $request = $db->prepare("SELECT * FROM episode WHERE id = :id");
      $request->execute(array(
        "id" => $id
      ));
      $episode = $request->fetch();
      return $episode;

    }

    private function dbConnect()
    {
        $db = new PDO('mysql:host=localhost;dbname=writer-project;charset=utf8', 'root', '');
        return $db;
    }
}
