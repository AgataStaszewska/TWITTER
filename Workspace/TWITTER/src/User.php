<?php

include("connection.php");
class User {
  private $id;
  private $username;
  private $hashedPassword;
  private $email;

  public function __construct(){
    $this->id = -1;
    $this->username = "";
    $this->email = "";
    $this->hashedPassword = "";
  }
  public function getId(){
    return $this->id;
  }
  public function setUsername($newUsername){
    $this->username = $newUsername;
  }

  public function setEmail($newEmail){
    $this->email = $newEmail;
  }
  public function getEmail(){
      return $this->email;
  }

  public function setPassword($newPassword){
    $newHashedPassword = password_hash($newPassword,PASSWORD_BCRYPT);

    $this->hashedPassword = $newHashedPassword;
  }

  public function saveToDB(){
    global $conn;
    if($this->id == -1){
      $sql = "INSERT INTO Users(username, email, hashed_password) VALUES (?, ?, ?)";
      $result = $conn->prepare($sql);
      $result->execute([$this->username, $this->email, $this->hashedPassword]);
    }else{
      $sql = "UPDATE Users SET username=?, email=?, hashed_password=? WHERE id=$this->id";
      $result = $conn->prepare($sql);
      $result->execute([$this->username, $this->email, $this->hashedPassword]);
      if($result == true){
        return true;  //A TO PO CO?
      }
    }
    return false;
  }
  static public function deleteUser($id){
    global $conn;
    $sql = "SELECT COUNT(DISTINCT id) FROM Users";
    $result = $conn->query($sql);
    $rows = $result->fetch();
    $count = $rows[0];

    if($id<=$count){
      $sql = "DELETE FROM Users WHERE id=?";
      $result = $conn->prepare($sql);
      $result->execute([$id]);
      echo ("User deleted");
    }else{
      echo("Nie ma użytkownika o takim numerze ID");
      echo "<br>";
    }
  }
  static public function loadUserById($id){
      global $conn;
      $sql = "SELECT username, email, hashed_password FROM Users WHERE id=?";
      $result = $conn->prepare($sql);
      $result->execute([$id]);
        foreach($result as $row){
          echo("Nazwa użytkownika to ".$row["username"].", a jego e-mail to ".$row["email"]);
          echo "<br>";

      }
      $loadedUser = new User();
      $loadedUser->id = $id;
      $loadedUser->username = $row["username"];
      $loadedUser->email = $row["email"];
      $loadedUser->hashedPassword = $row["hashed_password"];

      return $loadedUser;
   }
   static public function loadUserByUsername($username){
       global $conn;
       $sql = "SELECT id, email, hashed_password FROM Users WHERE username=?";
       $result = $conn->prepare($sql);
       $result->execute([$username]);

       $row = $result->fetch();
       $loadedUser = new User();

       $loadedUser->id = $row["id"];
       $loadedUser->username = $username;
       $loadedUser->email = $row["email"];
       $loadedUser->hashedPassword = $row["hashed_password"];

       return $loadedUser;
    }



   static public function loadUserByEmail($email){
       global $conn;
       $sql = "SELECT username, id, hashed_password FROM Users WHERE email=?";
       $result = $conn->prepare($sql);
       $result->execute([$email]);

         foreach($result as $row){
           echo("Nazwa użytkownika to ".$row["username"].", a jego id to ".$row["id"]);
           echo "<br>";

       }


       $loadedUser = new User();
       $loadedUser->id = $row["id"];
       $loadedUser->username = $row["username"];
       $loadedUser->email = $email;
       $loadedUser->hashedPassword = $row["hashed_password"];

       return $loadedUser;

  }
  static public function loadAllUsers(){
    global $conn;
    $sql = "SELECT * FROM Users";
    $usersArray = [];
    $result = $conn->query($sql);

    foreach($result as $row){
      $loadedUser = new User();
      $loadedUser->id = $row["id"];
      $loadedUser->username = $row["id"];
      $loadedUser->hashedPassword = $row["hashed_password"];
      $loadedUser->email = $row["email"];

      $usersArray[] = $loadedUser;
    }
  }
}
// var_dump(User::loadUserByEmail("bruce.wayne@gmail.com"));
// var_dump(User::loadUserByUsername("Spiderman"));

 ?>
