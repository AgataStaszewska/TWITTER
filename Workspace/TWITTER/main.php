<!DOCTYPE html>

<?php
if(!isset($_SESSION)){
  session_start();
}
include("src/connection.php");
include("src/User.php");
include("src/Tweet.php");
include("src/Comments.php");
$username = $_SESSION['username'];
$user = new User();
$user = $user->loadUserByUsername($username);

?>
<?php
  if($_SERVER['REQUEST_METHOD']=="POST"){
    if($_POST["tweet"]!= null){
      $tweet = new Tweet();
      $id=$user->getId();
      $tweet->setUserId($id);
      $tweet->setText($_POST['tweet']);
      $date = date("Y-m-d");
      $tweet->setCreationDate($date);
      $tweet->saveToDB();
  

    }else{
      echo ("Proszę coś wpisać!");
    }
  }
   ?>

<html>
<head>
  <meta charset=UTF-8>
  <title>Ćwierkacz strona główna</title>
</head>

<form action="" method="post">
  <span style="font-size:20px">Ćwierknij sobie:</span><br>
  <input type="text" name="tweet" maxlength="140">
    <input type="submit" value="Ćwierk!">


<br>
<br>
<br>
</form>
<span style="font-size:20px">Ćwierknięte:</span><br>
  <?php
 Tweet::loadAllTweets();
  ?>
</td>
</tr>
</table>

</html>
