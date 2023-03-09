<?php
    include ('../connectdatabase.php');
        if (!$conn){
            die("Connection failed: " . mysqli_connect_error());
        } else {
            if ($_SERVER['REQUEST_METHOD'] == "POST") {
                $driverid = $_POST['driverid'];
                $named = $_POST['named'];
                $sex = $_POST['sex'];
                $date = $_POST['date'];
                $username = $_POST['username'];
                $passwordd = $_POST['passwordd'];
                $numphone = $_POST['numphone'];
                $driverno = $_POST['driverno'];

                $sql = "UPDATE `driver` SET `Driver_ID`='$driverid',`NameD`='$named',`sex`='$sex',`Date_of_Birth`='$date',`Username`='$username',`PasswordD`='$passwordd',`Number_Phone`='$numphone',`Driver_license_no`= '$driverno' WHERE Driver_ID = '".$_POST["driverid"]."' ";
                if (mysqli_query($conn, $sql)) {
                  echo "New record created successfully";
                  header('Location:../datadrivers.php');
                } else {
                  echo "Error: ". mysqli_error($conn);
                }             
            }
        }
    mysqli_close($conn);
?>