<?php

    $host = "localhost";
    $user = "root";
    $password = "";
    $databese = "paypark";

    $conn = new mysqli($host, $user, $password, $databese);
    if(!$conn){
        die("Connection Failed: ". $conn->connect_error());
    }
?>