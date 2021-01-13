<?php
session_start();

require_once "db/database-connection.php";
if (!$customDB->checkUserName($_POST['userName'])) {
    $customDB->sendData();
    header("Location: login.php");
} else {
    $_SESSION["Message"]= "<br>User exist already<br>";
    header("Location: .");
}
