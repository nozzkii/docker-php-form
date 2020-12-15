<?php
session_start();

require_once "db/database-connection.php";
$customDB->fetchData($_POST['userName'], $_POST['password']);
if ($customDB->userName == $_POST['userName'] && password_verify($_POST['password'], $customDB->hashedPassword)) {
    echo $_SESSION["userName"]=$_POST['userName'];
    header("Location: account.php");
   } else {
    header("Location: login.php");
}