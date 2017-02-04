<?php
if(!isset($_SESSION)){
  session_start();
}
include("src/User.php");
include("src/Tweet.php");
include("src/Comments.php");
$username = $_SESSION['username'];
$user = new User();
$user = $user->loadUserByUsername($username);
var_dump($user);
?>

<html>
<head>
  <meta charset=UTF-8>
  <title>Ćwierkacz strona główna</title>
</head>

<form action="" method="post">
  <span style="font-size:20">Ćwierknij sobie:</span><br>
  <input type="text" name="tweet" maxlength="140">
  <?php
  if($_SERVER['REQUEST_METHOD']=="POST"){
    if($_POST['tweet']!= null){
      $tweet = new Tweet();
      $tweet->setText($_POST['tweet']);
      $date = date("Y-m-d");
      var_dump($date);
      $tweet->setCreationDate($date);
      $tweet->setUsername($_SESSION['username']);
      $id=$user->getId();
      $tweet->setUserId($id);
      $tweet->saveToDB();
      var_dump($tweet);
    }else{

    }
  }
   ?>

<br>
<br>
<br>
</form>
<span style="font-size:20">Ćwierknięte:</span><br>
  <?php
 Tweet::loadAllTweets();
  ?>
</td>
</tr>
</table>

</html>
