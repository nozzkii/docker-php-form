<?php
function my_extensions($class) {
    $file = $class . '.php';
	$file = str_replace('\\', DIRECTORY_SEPARATOR, $file);
    if(file_exists($file)) {
        require_once $file;
    }
}