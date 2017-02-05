<?php
if(!isset($_SESSION)){
  session_start();
}

include("src/User.php");
include("src/Tweet.php");
$username = $_SESSION['username'];
$user = new User();
$user = $user->loadUserByUsername($username);



?>

<html>
<head>
  <meta charset=UTF-8>
  <title>Panel użytkownika</title>
</head>
<body>
  <?php
  echo "Witaj," .$_SESSION['username']."!";
  echo "<br>";
  echo "<br>";
  echo "<br>";
  echo "<br>";
  ?>
  <a href="main.php">Przejdź do strony głównej</a><br>
  <a href="messages.php">Przejdź do skrzynki pocztowej</a><br>
  <span style="font-size:20px">Twoje ćwierki:</span><br>
  <br>
  <br>

  <?php
  Tweet::loadAllTweetsByUserId($user->getId());

  ?>
</body>
</html>

<?php
 ?>
