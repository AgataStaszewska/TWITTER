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
  public function checkPassword($passwordToCheck){
    if(password_verify($passwordToCheck, $this->hashedPassword))
    {return true;
    }else{
      return false;
    }
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
      // var_dump($loadedUser);

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

       var_dump($row);
       $loadedUser = new User();
       $loadedUser->id = $row["id"];
       $loadedUser->username = $row["username"];
       $loadedUser->email = $email;
       $loadedUser->hashedPassword = $row["hashed_password"];
       var_dump($loadedUser);

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
    var_dump($usersArray);
  }
}
//
// User::loadAllUsers();
// User::loadUserById(5);
// User::loadUserById(7);
// User::loadUserById(3);

// User::loadUserByEmail("bruce.wayne@gmail.com");
// User::loadUserByEmail("lord.emperor@asgard.com");
// die();
//
// $user1 = new User();
// $user1->setUsername("Batman");
// $user1->setEmail("bruce.wayne@gmail.com");
// $user1->setPassword("batman1234");
//
// $user1->saveToDB();
// User::loadUserById(2);

// $user2 = new User();
// $user2->setUsername("Thor");
// $user2->setEmail("thor.odinsson@asgard.com");
// $user2->setPassword("thor1234");
//
// $user2->saveToDB();
// User::loadUserById(3);

// $user3 = new User();
// $user3->setUsername("Loki");
// $user3->setEmail("lord.emperor@asgard.com");
// $user3->setPassword("thorsmells1234");
//
// $user3->saveToDB();
// User::loadUserById(4);

// $user4 = new User();
// $user4->setUsername("Professor_X");
// $user4->setEmail("charles.xavier@gmail.com");
// $user4->setPassword("longandcomplicatedpassword789");
//
// $user4->saveToDB();
// User::loadUserById(5);

// $user5 = new User();
// $user5->setUsername("Atalanta");
// $user5->setEmail("atalanta@gmail.com");
// $user5->setPassword("bowsbowsbows777");
//
// $user5->saveToDB();
// User::loadUserById(6);

// $user6 = new User();
// $user6->setUsername("Jessica_Jones");
// $user6->setEmail("jessica@alias.com");
// $user6->setPassword("marshmallow333");
//
// $user6->saveToDB();
// User::loadUserById(7);

// $user7 = new User();
// $user7->setUsername("UserX");
// $user7->setEmail("userx@gmail.com");
// $user7->setPassword("userx123");
//
// $user7->saveToDB();
// User::loadUserById(8);
$user = User::loadUserById(3);
// echo $user->email;
echo $user->getEmail();
$user->setEmail("loki@esrgdr.com");
echo $user->getEmail();
$user->setPassword("abcd");
$user->saveToDB();
User::deleteUser(3);
// $user->setPassword("lokilokiloki");
// $user->saveToDB();
 ?>
