<?php

    $server = "localhost";
    $user = "root";
    $password = "";
    $db_name = "mwi";


    $conn = mysqli_connect($server, $user, $password, $db_name);

    if ( !$conn ) {
        die("Gagal Terhubung Database : " . mysqli_connect_error());
    } 

?>