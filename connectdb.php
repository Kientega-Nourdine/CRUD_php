<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "crud";

    // create connection
    $connectDb = mysqli_connect($host,  $username, $password, $dbname);

    // check connection
    if(!$connectDb) {
        die('Connection failed : ' . mysqli_connect_error());
    }

    // echo 'Connection reussie!';
?>