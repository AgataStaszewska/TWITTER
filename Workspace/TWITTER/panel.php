<?php
if(!isset($_SESSION)){
  session_start();
}

include("src/User.php");
include("src/Tweet.php");
$username = $_SESSION['username'];
$user = new User();
$user = $user->loadUserByUsername($username);
// var_dump(User::loadUserByUsername($username));
// var_dump($user);



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
  <span style="font-size:20">Twoje ćwierki:</span><br>
  <br>
  <br>

  <?php
  Tweet::loadAllTweetsByUserId($user->getId());

  ?>
<a href="main.php">Przejdź do strony głównej</a>
</body>
</html>

<?php
 ?>
