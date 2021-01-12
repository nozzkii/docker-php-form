<?php

require_once "db/database-connection.php";
$customDB->fetchData();
?>
<!DOCTYPE>
<html>
<head>
<title>PHP FORM</title>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous"/>
<link rel="stylesheet" type="text/css" href="css/main.css"/>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
</head>
<body>
<?php

$info = array('FirstName' => $customDB->firstName, 'LastName' => $customDB->lastName, 'StreetAdress' =>  $customDB->streetAdress, 'SecondStreetAdress' => $customDB->secondStreetAdress, 'City' => $customDB->city,  'Region' => $customDB->region, 'Postal' => $customDB->postal, 'Country' => $customDB->country);

echo'<ul>';
foreach ($info as $key => $value){
    echo '<li>' . $key . ': '. $value.'</li>';
}
echo'</ul>';
?>

<div id="output">INFO:</div>
<button type="button" id="logout">OK</button>

</body>
</html>