<?php
session_start();


require_once "db/database-connection.php";
$customDB->fetchData();

if(!$customDB->userName == $_POST['userName']){
    header("Location: user.php");
    $customDB->sendData();
}else{
    $_SESSION["Message"]="User already exist";
    header("Location: index.php");
}

