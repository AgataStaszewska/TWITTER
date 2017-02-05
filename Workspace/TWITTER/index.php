<?php
if(!isset($_SESSION)){
  session_start();
}
include("src/User.php");

?>
<!DOCTYPE html>
<html>
<head>
  <meta charset=UTF-8>
  <title>Ćwierkacz strona logowania</title>
</head>
<body>
  <form action="" method="post">
    Nazwa użytkownika:<br>
    <input type="text" name="username"><br>
    Hasło:<br>
    <input type="text" name="password"><br>
    <input type="submit" value="Zaloguj">
    <?php
    if($_SERVER['REQUEST_METHOD']=="POST"){
      $sql = "SELECT * FROM Users WHERE username=?";
      $result = $conn->prepare($sql);
      $result->execute([$_POST['username']]);
      $rows = $result->fetch();
      $_SESSION['username']= $_POST['username'];
      if(!empty($rows) && $rows['hashed_password']==(password_verify($_POST['password'],$rows['hashed_password']))){
        $url = "panel.php";
        header("Location: panel.php");
      }else{
        echo ("Błędne dane!");
        return false;
      }
    }
 ?>
    <br>
    <br>
  </form>
  <a href="register.php">Nie mam konta, a chcę mieć!</a>

</body>
</html>
<?php
?>
