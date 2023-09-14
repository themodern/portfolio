<?php
    session_start();
    $reserve = $_SESSION['reserve'];
    $carID = $_REQUEST['carID'];
    $pic = $_REQUEST['pic'];
    $name = $_REQUEST['name'];
    $price = $_REQUEST['price'];
    $availability = $_REQUEST['availability'];
    $period = 1;
    
    if(isset($availability)){
        if ($availability == "false"){
            print("false");
            exit();
        }else{
            print("true");
        }
    }
    if (!empty($carID)){
        $reserve[$carID] = array("carID"=> $carID, "pic" => $pic, "name" => $name, "price" => $price, "availability" => $availability, "period" => $period);
        $_SESSION['reserve'] = $reserve;
    }
?>