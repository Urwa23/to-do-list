<?php

//Demand a get parameter
if ( !isset($_GET['name']) || strlen($_GET['name']) < 1 )
{
  die('Name parameter missing');
}

//logout
if (isset($_POST['logout']))
{
  header('Location: index.html');
  return;
}
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <link href="https://fonts.googleapis.com/css2?family=Quicksand&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="C:\Users\Fakiha Maqsood\Downloads\fontawesome-free-5.13.0-web\fontawesome-free-5.13.0-web\css\all.min.css">

    <title>Document</title>
</head>
<body>
    <div class="container">
      <div class="header">
        <form method="post">
          <input type="submit" name="logout" value="Logout">
        </form>
      </div>
        <div class="header">
            <h1>TO-DO list</h1>
            <input type="text" id="input_value" placeholder="what to you want to do">
            <span class="additem">ADD</span>
        </div>
        <ul id="mylist">
            <li>wow</li>
            <li class="checked">wow</li>
             <li>wow</li>
        </ul>
    </div>
    <script src="todo.js"></script>

</body>
</html>
