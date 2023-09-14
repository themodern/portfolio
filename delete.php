<?php
    session_start();
    $car = $_REQUEST['did'];
    if (isset($car)){
        unset($_SESSION['reserve'][$car]);
    }
    header("Location:bookings.php");
?>