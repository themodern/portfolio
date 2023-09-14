<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- <script src="./JavaScript/indexScript.js"></script> -->
    <link rel="stylesheet" href="CSS/bookings.css">
    <!-- fontawesome -->
        <script src="https://kit.fontawesome.com/e877e0cb1d.js" crossorigin="anonymous"></script>
        <!-- bootstrap -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <title>Car Bookings</title>
</head>

<body>
    <div id = "title" style="text-align: center; " > Reservation</div>
    <div>
        <form action = "checkout.php" name = "submission" onsubmit="return isEmpty()">
            <table>
                <tr>
                    <th>Thumbnail</th>
                    <th>Vehicle</th>
                    <th>Price per Day</th>
                    <th>Rental Days</th>
                    <th>Actions</th>
                </tr>

                <?php
                    session_start();
                    $reserve = $_SESSION['reserve'];
                    $rows = count($_SESSION['reserve']);
                    if (isset($reserve)){
                        foreach($reserve as $car){
                            print "<tr>";   
                            print "<td><img src = 'carImages/".$car['pic'].".jpeg' width = '100px' height = '100px'></td>";
                            print "<td>".$car['name']."</td>";
                            print "<td>".$car['price']."</td>";
                            print "<td><input type='number' name='".$car['carID']."' min = '1' max='20' value = '1' ></td>";
                            print "<td><a href = 'delete.php?did=".$car['carID']."'> Delete </a> </td>";
                            print "</tr>";
                        }
                    }
                ?>
                <tr>
                    <td colspan="5" ><input type="submit" value="Proceeding to CheckOut" id="myCheckOutButton"></td>
                </tr> 
            </table>
        </form>
    </div>
</body>

<script>
    function isEmpty(){
        let rows = <?php print $rows; ?>;
        if (rows == 0 ){
            alert("Your reservation is empty");
            window.location.href = "bookings.php"
            return false;
        }
    }
</script>
</html