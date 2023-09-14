<?php
    include('includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <script src="./JavaScript/indexScript.js"></script> -->
    <link rel="stylesheet" href="CSS/checkout.css">
    <!-- fontawesome -->
        <script src="https://kit.fontawesome.com/e877e0cb1d.js" crossorigin="anonymous"></script>
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title class="text-center">Check Out</title>
</head>

<body>
    <div id = "title" > Check Out</div>

    <?php 
        session_start();
        $reserve = $_SESSION['reserve'];
        $total = 0;
        foreach ($reserve as $p){
            $car = $p['carID'];
            $days = $_REQUEST[$car];
            $_SESSION['reserve'][$car]['period'] = $days;
            $total += $p['price'] * $days;
        }
    ?>
    

    <form action= "summary.php" method="POST">
        <table>
            
        <tr>
            <td class="left"> First Name:<span style="color:red">*</span></td>
            <td><input type = "text" class="right" name="firstname" required></td>
        </tr>
        <tr>
            <td class="left"> Last Name:<span style="color:red">*</span></td>
            <td><input type="text" class="right" required></td>
        </tr>

 
        <tr>
            <td class="left">Email Address:<span style="color:red">*</span></td>
            <!-- <td><input type="text" class="right" name="email" id="emailInput" required></td> -->
            <td><input type="email" class="right" name="email" id="emailInput" required title="Please enter a valid email address"></td>
        </tr>


        <tr>
            <td class="left">Address Line 1:<span style="color:red">*</span> </td>
            <td><input type="text" class="right" name="address1" required></td>
        </tr>
        <tr>
            <td class="left">Address Line 2: </td>
            <td><input type="text" class="right" name="address2"></td>
        </tr>
        <tr>
            <td class="left">City:<span style="color:red">*</span></td>
            <td><input type="text" class="right" name="city" required></td>
        </tr>
        <tr>
            <td class="left">State:<span style="color:red">*</span> </td>
            <td >
                <select class = "right" id = "state" name="state" required>
                    <option value = "AUSTRALIAN CAPITAL TERRITORY" >AUSTRALIAN CAPITAL TERRITORY</option>
                    <option value = "NEW SOUTH WALES">NEW SOUTH WALES</option>
                    <option value = "VICTORIA">VICTORIA</option>
                    <option value = "QUEENSLAND">QUEENSLAND</option>
                    <option value = "SOUTH AUSTRALIA">SOUTH AUSTRALIA</option>
                    <option value = "WEST AUSTRALIA">WEST AUSTRALIA</option>
                    <option value = "TASMANIA">TASMANIA</option>
                </select>
            </td>
        </tr>



        <tr>
            <td class="left">Postal Code:<span style="color:red">*</span></td>
            <!-- set postal code input min = 0 -->
           
            <td><input type="number" class="right" name="postal_code"  min = '1' required></td>
        </tr>


        <tr>
            <td class="left">Payment Type:<span style="color:red">*</span> </td>
            <td >
                <select  class = "right" id = "payment" name="payment" required>
                    <option value = "Visa" >Visa</option>
                    <option value = "Master">Master</option>
                    <option value = "PayPal">PayPal</option>
                </select>
            </td>
        </tr>

        <tr>
            <td class="left">Your total payment is: $ <?php print $total; ?> </td>
            <!-- <td class = "right"></td> -->
            <input type="hidden" name="total" value="<?php echo $total; ?>">
        </tr>

        <tr>
            <td><input type= "submit" name="submit_btn" value="Booking" id=Checkout></td>
        </tr>


        </table>
    </form>
 
    <button onClick="back()"  id = "homebtn">Continue Selection</button>
    <!-- <div class="left">Your total payment is: $ <?php print $total; ?></div> -->
    

</body>

<script>
    // back to Homepage
    function back(){
        window.location.href = "bookings.php";
        var modal = parent.document.getElementById("modal");
        modal.style.display = "none";
        return false;
    }

</script>
</html>
