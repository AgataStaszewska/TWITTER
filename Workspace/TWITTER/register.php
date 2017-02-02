<?php
include("src/User.php");

 ?>


<html>
<head>
  <meta charset=UTF-8>
  <title>Ćwierkacz strona rejestracji</title>
</head>
  <form action="" method="POST">
    Nazwa użytkownika:<br>
    <input type="text" name="username"><br>
    E-mail:<br>
    <input type="text" name="email"><br>
    Hasło:<br>
    <input type="text" name="password"><br>
    Powtórz hasło:<br>
      <input type="text" name="password2"><br>
    <input type="submit" value="Zarejestruj">
    <?php

    if($_SERVER['REQUEST_METHOD']== "POST"){
      if(($_POST['username']!= null) && ($_POST['email']!= null) && ($_POST['password']!= null) && ($_POST['password2']!= null) && ($_POST["password"]==$_POST["password2"])){
        $user = new User();
        $user->setUsername($_POST["username"]);
        $user->setEmail($_POST["email"]);
        $user->setPassword($_POST["password"]);
        $user->saveToDB();
        return true;
      }else{
        echo ("Źle wpisane dane!");
        return false;
      }
    }
 ?>
    <br>
    <br>
    <br>
    <button formaction="index.php">Jak nie mam, jak mam!</button>


  </form>


</html>
