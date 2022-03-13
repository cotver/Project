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
    $username = "it61070069_registrar";
    $password = "12345";
    $rcon= new mysqli($servername, $username, $password);
    mysqli_query($rcon,"set character set utf8");
    return $rcon;
}
?>