<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <script src="./JavaScript/indexScript.js"></script> -->
    <link rel="stylesheet" href="CSS/summary.css">
    <!-- fontawesome -->
        <script src="https://kit.fontawesome.com/e877e0cb1d.js" crossorigin="anonymous"></script>
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Thanks</title>
</head>
    
<body>
    <div>Dear <?php print $_REQUEST['firstname']; ?>, </div>
    <div>Thank you for using UTS Hertz. </div>
    
    <?php
        $total = $_REQUEST['total'];        
        // check email for bond payment
        include('includes/connect.php');
        global $conn;
        $today = date("Y-m-d");
        $previousDate = date("Y-m-d", strtotime("-90 days", strtotime($today)));
        $email = $_POST['email'];
        $sql = "SELECT * FROM `Renting_History` WHERE user_email = '$email' AND rent_date >= '$previousDate' ";
        $result = mysqli_query($conn, $sql);
        $count = mysqli_num_rows($result);
        $bond = 200;
        if($count >= 1){
            $bond = 0;
        }
        if (isset($_POST['submit_btn'])) {
        $sql = "INSERT INTO `Renting_History`(user_email, rent_date, bond_amount ) VALUES ('$email', '$today', $bond)";
        if ($conn->query($sql) === TRUE) {
        echo "<div> New booking created successfully </div>";
        } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
        }
        }
    ?>
    <div>Your total rental payment is: $ <?php print $total; ?></div>

    <div>The required bond payment is: $ <?php print $bond; ?></div>

    <table>
    <tr>
                    <th>Thumbnail</th>
                    <th>Vehicle</th>
                    <th>Price per Day</th>
                    <th>Rental Days</th>
    </tr>
    
    <div>Your order summary: </div>
    <?php
        session_start();
        $reserve = $_SESSION['reserve'];
        if (isset($reserve)){
            $jsonFilePath = "JavaScript/cars.json";
            $jsonData = file_get_contents($jsonFilePath);
            $cars = json_decode($jsonData, true);

            foreach($reserve as $car){
                print "<tr>";   
                print "<td><img src = 'carImages/".$car['pic'].".jpeg' width = '100px' height = '100px'></td>";
                print "<td>".$car['name']."</td>";
                print "<td>".$car['price']."</td>";
                print "<td>".$car['period']."</td>";
                print "</tr>";
                $carID = $car['carID'];
                $availability = false;
                foreach ($cars as &$carData) {
                    if ($carData['carID'] == $carID) {
                        $carData['Availability'] = $availability;
                        break;
                    }
            }
        
        }
        $updatedJsonData = json_encode($cars, JSON_PRETTY_PRINT);
        file_put_contents($jsonFilePath, $updatedJsonData);
        // session_destroy();
        }
        session_destroy();
    ?>
    </table>
    <button onClick="backToCart()" id= "Homebtn"> Home </button>

</body>


<script>
    function backToCart() {
        window.location.href = "bookings.php";
        // Get the modal element
        var modal = parent.document.getElementById("modal");
        // Hide the modal element
        modal.style.display = "none";
        
    }
</script>
</html>
