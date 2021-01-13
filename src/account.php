<?php
session_start();
require_once "db/database-connection.php";
$customDB->fetchData();
?>
<!DOCTYPE>
<html>
<?php
include "./head.php";
?>
<body>
<?php

$info = array(
    'FirstName' => $customDB->firstName,
    'LastName' => $customDB->lastName,
    'StreetAdress' => $customDB->streetAdress,
    'SecondStreetAdress' => $customDB->secondStreetAdress,
    'City' => $customDB->city,
    'Region' => $customDB->region,
    'Postal' => $customDB->postal,
    'Country' => $customDB->country
);

echo "<div class='container'>
<h2>Kundenkonto</h2>
<ul>";
foreach ($info as $key => $value) {
    echo "<li class='form-control'>" . $key . ': ' . $value . '</li>';
}
echo "</ul>
<button type='button' id='logout'>OK</button>
</div>";
echo $_SESSION["Message"];
session_unset();
?>

</body>
</html>