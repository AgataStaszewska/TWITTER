<?php

$host = "localhost";
$user = "root";
$password = "coderslab";
$dbName = "twitter";
$conn = new PDO("mysql:host=$host;dbname=$dbName;charset=utf8",$user,$password);

if($conn->errorCode()!=null){
  die("You failed to connect, loser. Learn from your errors: ".$conn->errorInfo()[2]);
}else{
  echo("You have somehow managed to connect.");
  echo "<br>";
}

 ?>
