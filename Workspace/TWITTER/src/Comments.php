<?php

include("connection.php");
class Comment {
  private $id;
  private $username;
  private $creationDate;
  private $text;

  public function __construct(){
    $this->id = -1;
    $this->username;
    $this->text;
    $this->creationDate;
  }

  public function setText($text){
      $this->text = $text;
  }
  public function getText(){
      return $this->text;
  }
  public function setCreationDate($date){
      $this->creationDate = $date;
  }
  public function getCreationDate(){
      return $this->creationDate;
  }
  public function setUsername($username){
    $this->username = $username;
  }
}
