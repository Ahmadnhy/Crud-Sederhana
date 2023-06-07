<?php
    $servername = "localhost";
    $username   = "root";
    $password   = "";
    $db         = "inventory";

    $con = mysqli_connect($servername, $username, $password) or die ("Maaf gagal terhubung dengan Database");
    
    mysqli_select_db($con, $db);
?>