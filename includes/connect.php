<?php
    // connection using xampp ("ip address", "username", "password", "database name"")
    $conn = mysqli_connect("localhost","root","", "assignment2" );


        
    if (!$conn){
        die("Could not connect to Server");
    }


?>