<?php

    $server = "localhost";
    $user = "root";
    $pass = "";
    $db = "notebook";

    $conn = new mysqli($server,$user,$pass,$db);

    if($conn -> connect_errno) {
        die("Conexion fallida " .$conn->connect_errno);
    }else{
        return $conn; 
    }
    
?>