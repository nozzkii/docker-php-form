<?php
session_start();


require_once "db/database-connection.php";
$customDB->fetchData();
if(!$customDB->userName == $_POST['userName']){
    $customDB->sendData();
    header("Location: login.php");
    
}else{
    $_SESSION["Message"]="User already exist";
    header("Location: index.php");
}

