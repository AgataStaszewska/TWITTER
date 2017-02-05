<?php
include("connection.php");

class Message{
  private $id;
  private $user_id;
  private $text;
  private $creationDate;
  private $sender;


  public function __construct(){
    $this->id = -1;
    $this->user_id;
    $this->text;
    $this->creationDate;
    $this->sender;
    
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
  public function getSender(){
      return $this->sender;
  }
  public function setSender($sender){
      $this->sender = $sender;
  }

  static public function loadAllMessagesGotByUserId($userId){
  global $conn;
  $sql = "SELECT * FROM Messages WHERE user_id=? ORDER BY creationDate DESC";
  $messArray = [];
  $result = $conn->prepare($sql);
  $result->execute([$userId]);
    foreach($result as $row){
      $loadedMess = new Message();
      $loadedMess->id = $row["id"];
      $loadedMess->user_id = $row["user_id"];
      $loadedMess->text = $row["text"];
      $loadedMess->creationDate = $row['creationDate'];
      $loadedMess->sender = $row["sender"];
      $messArray[] = $loadedMess;
         echo $row["text"];
         echo "<br>";
         echo $row["creationDate"];
         echo "<br>";
         echo ("otrzymana od ");
         echo $row['sender'];
         echo "<br>";

    }
    
  }
  
  static public function loadAllMessagesSentByUsername($username){
  global $conn;
  $sql = "SELECT * FROM Messages WHERE sender=? ORDER BY creationDate DESC";
  $messArray = [];
  $result = $conn->prepare($sql);
  $result->execute([$username]);
    foreach($result as $row){
      $loadedMess = new Message();
      $loadedMess->id = $row["id"];
      $loadedMess->user_id["user_id"];
      $loadedMess->text = $row["text"];
      $loadedMess->creationDate=$row['creationDate'];
      $loadedMess->sender = $row["sender"];
      $messArray[] = $loadedMess;
         echo $row["text"];
         echo "<br>";
         echo $row["creationDate"];
         echo "<br>";
    }
    
  }
   public function saveMesToDB(){
    global $conn;
    $sql = "INSERT INTO Messages(user_id, text, creationDate, sender) VALUES (?, ?, ?, ?)";
    $result = $conn->prepare($sql);
    $result->execute([$this->user_id, $this->text, $this->creationDate, $this->sender]);
   }

}


?>
