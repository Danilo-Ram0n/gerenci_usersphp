<?php

$db = "company";
$host = "localhost";
$user = "root";
$pass = "";



try {
    $conn = new PDO ("mysql:dbname=$db;host=$host",$user,$pass);
} catch (PDOExcepction $err) {
    echo $err->getMessage();
}


?>

