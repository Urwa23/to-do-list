<?php
require_once "pdo.php"; 
if ( isset($_POST['cancel']) ) {
  header("Location: index.html");
  return;
}
$failure = false;
if (isset($_POST['name']) && isset($_POST['password']) && isset($_POST['email']) )
{
  if (strlen($_POST['name']) < 1 || strlen($_POST['password']) < 1 || strlen($_POST['email']) < 1)
  {
    $failure = 'Please enter your details';
  }
  else
  {
    $sql = 'INSERT INTO users (name, email, password) VALUES (:name, :email, :password)';
    $statement = $pdo->prepare($sql);
    $statement->execute( array(':name' => $_POST['name'],
                              ':email' => $_POST['email'],
                            ':password'=> $_POST['password']) );
   $failure = 'Account Created!';
  }

}
 ?>

<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <title>Index</title>
  </head>
  <body class="container">
    <div class="header">
      <a href="index.html">Home</a>
      &nbsp
      &nbsp
      <a href="login.php">Login</a>
      &nbsp
      &nbsp
      <h1>SIGN UP</h1>
    </div>
    <hr>
    <?php
      if ( $failure !== false ) {
          echo('<p style="color: red;">'.htmlentities($failure)."</p>\n");
      }
      ?>
    <form method="POST">
      <label for="name">User name</label>
      <input type="text" name="name">
      <br>
      <label for="email">Email</label>
      <input type="text" name="email">
      <br>
      <label for="password">Password</label>
      <input type="password" name="password">
      <br> <br>
      <input type="submit" name="create" value="Create account">
      <input type="submit" name="cancel" value="Cancel">
    </form>
  </body>
</html>
