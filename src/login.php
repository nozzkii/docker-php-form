<?php
session_start();
require_once "extension/form.php";
require_once "db/database-connection.php";
?>

<!DOCTYPE>
<html>
<?php
include "./head.php";
?>
<body>

<?php
$signIn = new Form('signIn', "signIn");
session_unset();
?>

<div id="output"></div>
</body>

</html>