<?php
session_start();

header("Location: index.php");
include "db/database-con.php";

if(!empty($_POST["firstName"])&& $_POST["submit"]){
    $_SESSION["Message"] = "Thank " . $_POST["firstName"] . " for sending us a message";
    $customDB->sendData();
}
