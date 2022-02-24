<?php
define("REQUEST_METHOD", $_SERVER['REQUEST_METHOD']);


$response = "";

function error($id,$id2) {
    echo $id,$id2;
}

function replicateConnection() {
    $servername = "localhost";
    $username = "root";
    $password = "";
    return new mysqli($servername, $username, $password);
}
?>