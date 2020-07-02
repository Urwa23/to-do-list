<?php
echo "<pre>\n";
require_once "pdo.php";
echo "<pre>\n";
$statement = $pdo->query("SELECT * FROM users");
$rows = $statement->fetchAll(PDO::FETCH_ASSOC);
print_r($rows);
echo "</pre>\n";
 ?>
 
