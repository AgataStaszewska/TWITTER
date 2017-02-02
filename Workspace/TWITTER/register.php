<html>
<head>
  <meta charset=UTF-8>
  <title>Ćwierkacz strona rejestracji</title>
</head>
  <form action="zarejestrowany.html" method="POST">
    Nazwa użytkownika:<br>
    <input type="text" name="username"><br>
    E-mail:<br>
    <input type="text" name="email"><br>
    Hasło:<br>
    <input type="text" name="password"><br>
    Powtórz hasło:<br>
      <input type="text" name="password2"><br>
    <input type="submit" value="Zarejestruj"<?php if("password"=="password2"){
      $user = new User();
      $user->setUsername($_POST["username"]);
      $user->setEmail($_POST["email"]);
      $user->setPassword($_POST["password"]);
      return true;
    }else{
      echo ("Hasła się nie zgadzają!");
      return false;
    } ?>>
    <br>
    <br>
    <br>
    <button formaction="index.html">Jak nie mam, jak mam!</button>


  </form>


</html>
