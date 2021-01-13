<?php
function my_extensions($class)
{
    $file = 'extension/' . $class . '.php';
    if (file_exists($file)) {
        require_once $file;
    }
}
