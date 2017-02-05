<!DOCTYPE html>

<?php
if(!isset($_SESSION)){
  session_start();
}
include("src/connection.php");
include("src/Message.php");
include("src/User.php");
include("src/Tweet.php");
$username = $_SESSION['username'];
$user = new User();
$user = $user->loadUserByUsername($username);
$userId = $user->getId();
?>
<?php
if($_SERVER['REQUEST_METHOD']=="POST"){
    if($_POST["receiver"]!= null){
      $message = new Message();
      $receiver = new User();
      $receivername = $_POST['receiver'];
      $receiver = $receiver->loadUserByUsername($receivername);
      $id = $receiver->getId();
      $message->setUserId($id);
      $message->setText($_POST['message']);
      $date = date("Y-m-d");
      $message->setCreationDate($date);
      $message->setSender($username);
      $message->saveMesToDB();
    }else{
      echo ("Proszę wpisać adresata!");
    }
}

?>

<html>
<head>
  <meta charset=UTF-8>
  <title>Panel użytkownika</title>
</head>
<body>
    <a href="main.php">Wróć do strony głównej</a><br>
    <h2>Napisz wiadomość:</h2>
<form action="" method="post">
Adresat:<br>
<input type="text" name="receiver"><br>
Wiadomość:<br>
<input type="text" name="message"><br><br>
<input type="submit" value="Wyślij">
</form>      
    <h2>Odebrane wiadomości:</h2>
<?php
Message::loadAllMessagesGotByUserId($user->getId());            
?>
    <h2>Wysłane wiadomości:</h2>
<?php
Message::loadAllMessagesSentByUsername($username);
?>
</body>
</html>
