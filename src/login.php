<?php
session_start();
require_once "extension/form.php";
require_once "db/database-connection.php";
?>

<!DOCTYPE>
<html>
<meta>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
</meta>
<body>
<h1>BESTE SEITE</h1>

<?php
$signIn = new Form('signIn', "signIn");
echo $_SESSION["message"];
session_unset();
?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script src="./js/main.js"></script>
</body>

</html>