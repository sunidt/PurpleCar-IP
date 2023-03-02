<?php
    include ('../connectdatabase.php');
        if (!$conn){
            die("Connection failed: " . mysqli_connect_error());
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $carcode = $_POST['carcode'];
                $namelocation = $_POST['namelocation'];
                $route = $_POST['route'];


                $sql = "UPDATE `parking_spot` SET `car_reservation_code`='$carcode',`Parking_place_name`='$namelocation',`route_b_r`='$route' WHERE car_reservation_code = '".$_POST["carcode"]."' ";
                if (mysqli_query($conn, $sql)) {
                  echo "New record created successfully";
                  header('Location:../changeParkingSpot.php');
                } else {
                  echo "Error: ". mysqli_error($conn);
                }             
            }
        }
    mysqli_close($conn);
?>