<?php
define("REQUEST_METHOD", $_SERVER['REQUEST_METHOD']);


$response = "";

function error() {
    $id = 1;
    for ($i = 0; $i < func_num_args(); $i++) {
        printf("Argument %d: %s\n", $i, func_get_arg($i));
    }
}


function replicateConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    return new mysqli($servername, $username, $password);
}
?>