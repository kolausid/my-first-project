<meta charset="utf-8">
<?php
$host = 'localhost';
$name = 'root';
$pass = 'mysql';
$nameDb = 'mydb';
$link = mysqli_connect($host, $name, $pass, $nameDb);
mysqli_query($link, "SET NAMES 'utf8'");
?>