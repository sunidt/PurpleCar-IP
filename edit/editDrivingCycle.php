<?php
    include ('../connectdatabase.php');
        if (!$conn){
            die("Connection failed: " . mysqli_connect_error());
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $drivid = $_POST['drivid'];
                $routeid = $_POST['routeid'];
                $startd = $_POST['start'];
                $driver = $_POST['driver'];
                $vehicle = $_POST['vehicle'];
                $dated = $_POST['date'];
                $timed = $_POST['time'];
                $remainTickets = $_POST['remainTickets'];

                $sql = "UPDATE `driving_cycle` SET `driving_cycle_id`='$drivid',`car_route_id`='$routeid',`stratid`='$startd',`Driver_ID`='$driver',`vehicle_registration`='$vehicle',`date_of_driving_circle`='$dated',`time_id`='$timed',`remaining_tickets`= '$remainTickets' WHERE driving_cycle_id = '".$_POST["drivid"]."' ";
                if (mysqli_query($conn, $sql)) {
                  echo "New record created successfully";
                  header('Location:../changeDricycle.php');
                } else {
                  echo "Error: ". mysqli_error($conn);
                }             
            }
        }
    mysqli_close($conn);
?>