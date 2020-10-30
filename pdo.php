<?php
$pdo = new PDO('mysql:host=localhost;port=8889;dbname=achatapp2',
   'ttu', '2020');
// See the "errors" folder for details...
$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
?>
