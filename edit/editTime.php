<?php
    include ('../connectdatabase.php');
        if (!$conn){
            die("Connection failed: " . mysqli_connect_error());
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $time_id = $_POST['time_id'];
                $timeT = $_POST['timeT'];
                $route_b_r = $_POST['route_b_r'];
                $start_NU_TC = $_POST['start_NU_TC'];

                $sql = "UPDATE `departure_time` SET `time_id`='$time_id',`timeT`='$timeT',`route_b_r`='$route_b_r',`start_NU_TC` = '$start_NU_TC' WHERE time_id = '".$_POST["time_id"]."' ";
                if (mysqli_query($conn, $sql)) {
                  echo "New record created successfully";
                  header('Location:../changeTime.php');
                } else {
                  echo "Error: ". mysqli_error($conn);
                }             
            }
        }
    mysqli_close($conn);
?>