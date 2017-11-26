<?php
  class Song {
    private $con;
    private $id;
    private $mysqliData;
    private $title;
    private $artistId;
    private $albumId;
    private $genre;
    private $duration;
    private $path;
    public function __construct($con, $id) {
      $this->con = $con;
      $this->id = $id;
      $query = mysqli_query($this->con,"SELECT * FROM Songs WHERE id='$this->id'");
      $this->mysqliData = mysqli_fetch_array($query);
      $this->title = $this->mysqliData['title'];
      $this->artistId = $this->mysqliData['artist'];
      $this->genre = $this->mysqliData['genre'];
      $this->albumId = $this->mysqliData['album'];
      $this->path = $this->mysqliData['path'];
      $this->duration = $this->mysqliData['duration'];
    }

    public function getTitle() {
      return $this->title;
    }
    public function getId() {
      return $this->id;
    }
    public function getArtist(){
      return new Artist($this->con,$this->artistId);
    }
    public function getAlbum() {
      return new Album($this->con, $this->albumId);
    }
    public function getGenre() {
      return $this->genre;
    }
    public function getPath() {
      return $this->path;
    }
    public function getDuration() {
      return $this->duration;
    }
    public function getMysqliData() {
      return $this->mysqliData;
    }
  }

?>
