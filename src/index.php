<?php session_start(); 
include "db/database-con.php";
include "extension/form.php";
?>

<!DOCTYPE>

<html lang="de">

<head>
    <title>PHP FORM</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"
        integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="css/main.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
    <script src="js/main.js"></script>
    <style>
    p#info{display:none}
    </style>
</head>


<body>
    <?php  
    $forme_one = new Form("Contact", "contact");
    ?>
    <button id="info">INFO</button>
    <p id="info">We are a company</p>
</body>
    
</html>

<?php

    if(!empty($_SESSION)){
        echo $_SESSION["Message"];
        session_unset();
    }

?>