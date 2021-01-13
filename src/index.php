<?php
session_start();
include 'db/database-connection.php';
include 'extension/form.php';
?>

<!DOCTYPE>
<html>
<?php
include "./head.php";
?>
<body>
<?php
$register = new Form('register', "register");
session_unset();
?>
<div id="output"></div>
</body>
</html>


