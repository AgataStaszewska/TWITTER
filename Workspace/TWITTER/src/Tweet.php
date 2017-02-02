<?php
include("connection.php");

class Tweet{
  private $id;
  private $user_id;
  private $text;
  private $creationDate;

  public function __construct(){
    $this->id = -1;
    $this->user_id = "";
    $this->text = "";
    $this->creationDate = "";
  }
  public function getId(){
    return $this->id;
  }
  public function setUserId($user_id){
    $this->user_id = $user_id;
  }
  public function getUserId(){
    return $this->user_id;
  }
  public function setText($text){
    $this->text = $text;
  }
  public function getText(){
    return $this->text;
  }
  public function setDate($date){
    $this->creationDate = $date;
  }
  public function getDate(){
    return $this->creationDate;
  }
  static public function loadTweetById($id){
      global $conn;
      $sql = "SELECT text FROM Twity WHERE id=?";
      $result = $conn->prepare($sql);
      $result->execute([$id]);
        foreach($result as $row){
          echo("$row["text"]");
          echo "<br>";

      }
      $loadedTweet = new User();
      $loadedTweet->id = $id;
      $loadedTweet->text = $row["text"];
      $loadedTweet->user_id = $row["user_id"];

      return $loadedUser;
   }
   static public function loadAllTweets(){
     global $conn;
     $sql = "SELECT * FROM Twity";
     $tweetsArray = [];
     $result = $conn->query($sql);

     foreach($result as $row){
       $loadedTweet = new Tweet();
       $loadedTweet->id = $row["id"];
       $loadedTweet->username = $row["user_id"];
        $loadedTweet->username = $row["text"];
       $tweetsArray[] = $loadedTweet;
     }
   }
   static public function loadAllTweetsByUserId($userId){
     
   }
}




 ?>
