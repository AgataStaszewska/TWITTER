<?php
include("connection.php");

class Tweet {
  private $id;
  private $user_id;
  private $text;
  private $creationDate;

  public function __construct(){
    $this->id = -1;
    $this->user_id;
    $this->text;
    $this->creationDate;
  }
  public function getId(){
    return $this->id;
  }
  public function setUserId($user_id){
    $this->user_id = $user_id;
  }
  public function setUsername($username){
    $this->username = $username;
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
  public function setCreationDate($date){
    $this->creationDate = $date;
  }
  public function getCreationDate(){
    return $this->creationDate;
  }
  static public function loadTweetById($id){
      global $conn;
      $sql = "SELECT text FROM Twity WHERE id=?";
      $result = $conn->prepare($sql);
      $result->execute([$id]);
        foreach($result as $row){
          echo $row["text"];
          echo "<br>";

      }
      $loadedTweet = new Tweet();
      $loadedTweet->id = $id;
      $loadedTweet->text = $row["text"];
      $loadedTweet->user_id = $row["user_id"];

      return $loadedUser;
   }
   static public function loadAllTweets(){
     global $conn;
     $sql = "SELECT * FROM Twity ORDER BY creationDate DESC"; 
     $tweetsArray = [];
     $result = $conn->query($sql);

     foreach($result as $row){
       $loadedTweet = new Tweet();
       $loadedTweet->id = $row["id"];
       $loadedTweet->user_id = $row["user_id"];
       $loadedTweet->text = $row["text"];
       $loadedTweet->creationDate = $row["creationDate"];
       $tweetsArray[] = $loadedTweet;
       echo "<table style='width:75%;border: 2px solid black'>";
       echo "<tr>";
       echo "<td>".($row["text"]." napisane ".$row["creationDate"])."<a href='tweetpage.php'>'Skomentuj ćwierka'</a>"."</td>";
       echo "</tr>";
       echo "</table>";
       echo "<br>";
       echo "<br>";
     }

   }
   static public function loadAllTweetsByUserId($userId){
     global $conn;
     $sql = "SELECT * FROM Twity WHERE user_id=? ORDER BY creationDate DESC";
     $tweetsArray = [];
     $result = $conn->prepare($sql);
     $result->execute([$userId]);
       foreach($result as $row){
         $loadedTweet = new Tweet();
         $loadedTweet->id = $row["id"];
         $loadedTweet->user_id["user_id"];
         $loadedTweet->text = $row["text"];
         $tweetsArray[] = $loadedTweet;
         echo $row["text"];
         echo "<br>";
         echo $row["creationDate"];
         echo "<br>";
         echo "<br>";

     }
  }
  public function saveToDB(){
    global $conn;
    $sql = "INSERT INTO Twity(user_id, text, creationDate) VALUES (?, ?, ?)";
    $result = $conn->prepare($sql);
    $result->execute([$this->user_id, $this->text, $this->creationDate]);
    return true;
    }
}


 ?>
