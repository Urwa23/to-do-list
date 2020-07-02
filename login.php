<?php
require_once 'pdo.php';
if ( isset($_POST['cancel']) ) {
  header("Location: index.html");
  return;
}
$failure = false; //if we have no _POST data
//Check to see if we have some _POST data
//If we do, process it
if (isset($_POST['who']) && isset($_POST['password']) )
{
  if (strlen($_POST['who']) < 1 || strlen($_POST['password']) < 1 )
  {
    $failure = 'User name and password are required';
  }
  else
  {
    $sql = 'SELECT name FROM users WHERE name = :un AND password = :pw';
    $statement = $pdo->prepare($sql);
    $statement->execute(array(
                  ':un' => $_POST['who'],
                  ':pw' => $_POST['password']));
    $check = $statement->fetch(PDO::FETCH_ASSOC);
    if ($check!= false )
    {
      //Redirect the browser to secret page
      header("Location: home.php?name=".urlencode($_POST['who']));
      return;
    }
    else
    {
      $failure = 'Incorrect password';
    }
  }
}

 ?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <?php require_once 'pdo.php'; ?>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <div class="container">
        <div class="header">
          <a href="index.html">Home</a>
            &nbsp
            &nbsp
            <a href="login.php">Login</a>
            &nbsp
            &nbsp
        </div>
    </div>

    <div class="container">
      <h1>Please Login</h1>
      <?php
      if ($failure !== false) {
        echo ('<p style= "color: red;">'.htmlentities($failure)."</p>\n");
      }
      ?>
      <form method="POST">
      <label for="name">User Name</label>
      <input type="text" name="who" id="name"> <br/> <br/>
      <label for="id_1723">Password</label>
      <input type="password" name="password" id="id_1723"><br/>
      <input type="submit" value="Log In">
      <input type="submit" name="cancel" value="Cancel">
      </form>

    </div>
  </body>
</html>
