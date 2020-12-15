<?php
session_start();
include 'autoload.php';
spl_autoload_register('my_extensions');

///MVC refactoring
// require_once "core/Application.php";
// $app = new Application();
// $app -> router->get('/', function(){
//     return 'Hello World';
// });
// $app->run();
// $uri = $_SERVER['REQUEST_URI'];
// echo $uri;
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
$register = new extension/Form('register', "register");
echo $_SESSION["Message"];
session_unset();
?>
<script type='text/javascript' src='js/main.js'></script>
</body>
</html>


