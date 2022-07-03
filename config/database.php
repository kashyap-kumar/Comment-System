<?php

    $hostname = "localhost";
    $username = "root"; // change as per need
    $password = "";     // change as per need
    $dbname   = "Comments";

    // create connection
    $conn = new mysqli($hostname, $username, $password, $dbname);

    // check connection
    if($conn->connect_error === TRUE)
        die("<div style='padding: 20px; background-color: rgb(255, 60, 46); text-align: center; color: white; font-weight: 600;'>Connection Error Occured :/</div>");

?>