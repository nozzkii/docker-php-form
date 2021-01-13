<?php
session_start();

require_once "db/database-connection.php";
$customDB->fetchData();
if ($customDB->userName == $_POST['userName'] && password_verify($_POST['password'], $customDB->hashedPassword)) {
    header("Location: account.php");
} else {
    $_SESSION["Message"]= "<br>Password is wrong<br>";
    header("Location: login.php");
}
