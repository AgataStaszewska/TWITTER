<?php
include("connection.php");


class Comment {
  private $id;
  private $username;
  private $creationDate;
  private $text;
  private $twitId;

  public function __construct(){
    $this->id = -1;
    $this->username;
    $this->text;
    $this->creationDate;
    $this->twitId;
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
  public function getUsername(){
      return $this->username;
  }
  public function displayComment($twitId){
      global $conn;
      $sql = "SELECT * FROM Comments WHERE twit_id=?";
      $commentsArray = [];
      $result = $conn->prepare($sql);
      $result->execute([$twitId]);
       foreach ($result as $row){
           $loadedComment = new Comment();
           $loadedComment->id = $row["id"];
           $loadedComment->text = $row['text'];
           $loadedComment->creationDate = $row['creationDate'];
           $loadedComment->twitId = $row['twit_id'];
           $loadedComment->username = $row['sender'];
           $commentsArray[] = $loadedComment;
            echo $row['text'];
            echo "<br>";
            echo ("napisane przez". $row['sender']." dnia ". $row['creationDate']);
       }
  }
  
  public function saveCommToDB(){
    global $conn;
    $sql = "INSERT INTO Comments(user_id, text, twit_id, sender) VALUES (?, ?, ?, ?)";
    $result = $conn->prepare($sql);
    $result->execute([$this->user_id, $this->text, $this->twit_id, $this->sender]);
   }

}
