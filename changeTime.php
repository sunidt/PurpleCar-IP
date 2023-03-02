<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ระบบจองตั๋วรถม่วงออนไลน์</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon">

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Handlee&family=Nunito&display=swap" rel="stylesheet">

    <!-- Font Awesome -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">

    <!-- Flaticon Font -->
    <link href="lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
    <!-- Navbar Start -->
    <div class="container-fluid bg-light position-relative shadow">
        <nav class="navbar navbar-expand-lg bg-light navbar-light py-3 py-lg-0 px-0 px-lg-5">
            <a href="" class="navbar-brand font-weight-bold text-secondary" style="font-size: 30px;">
                <!-- <i class="flaticon-043-teddy-bear"></i> -->
                <span class="text-primary">ระบบจองตั๋วรถม่วงออนไลน์</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="index1.php" class="nav-item nav-link">หน้าแรก</a>
                    <a href="summarize.php" class="nav-item nav-link">สรุปประวัติการจอง</a>
                    <a href="changeParkingSpot.php" class="nav-item nav-link">แก้ไขจุดจอดรถ</a>
                    <a href="changeTime.php" class="nav-item nav-link active">แก้ไขเวลาวิ่งรถ</a>
                    <a href="changeDricycle.php" class="nav-item nav-link">แก้ไขรอบรถ</a>
                    <a href="datadrivers.php" class="nav-item nav-link">แก้ไขข้อมูลคนขับรถ</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <!-- <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">แก้ไขเวลาเดินรถ</h3>
            <div class="d-inline-flex text-white">
            </div>
        </div>
    </div> -->
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5 ">
        <div class="container">
            <div class="row align-items-center d-flex flex-column align-items-center justify-content-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-5 mb-lg-0" src="" alt="">
                </div>
                <div class="">
                    <br>
              <table width='100%'>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
    
    <br>
              <table width='100%'>
                <tr>
                    <th>รหัสเวลา</th>
                    <th>เวลา</th>
                    <th>สายรถ</th>
                    <th>จุดเริ่มต้น</th>
                    <th></th><th></th>
                </tr>

    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">แก้ไขเวลาวิ่งรถ</h1>
            </div>
            <div class="container">
                <div class="text-center pb-2">
                    <div class="col-lg-3">
                        <fieldset>
                            <select name="Category" class="form-select" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                                <option selected>สายรถ</option>
                                <option type="checkbox" name="option1" value="blue">สายสีฟ้า</option>
                                <option value="red">สายสีแดง</option>
                            </select>
                        </fieldset>
                      </div>
                    <br>
                </div>
            </div>
            <?php
                        include('connectdatabase.php');
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        } else {
                            $sql = "SELECT * FROM `departure_time`";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $car_reservation = $row["time_id"];
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $row["time_id"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo substr(($row["time"]) ,0,5);
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["route_b_r"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["start_NU_TC"];
                                    echo "</td>";
                                    ?>
                                    <td><button data-toggle="modal" href=edit/editformTime.php" data-target="#theModal" onclick="window.location='edit/editformTime.php?id=<?php echo $row["time_id"];?>'">Edit</button></td>
                                    <td><button onclick="JavaScript:if(confirm('Confirm Delete?')==true){window.location='delete/deleteTime.php?id=<?php echo $row["time_id"];?>';}">Delete</button></td>
                                    <?php
                                    echo "</tr>";
                                }
                            }
                        }
                    ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    
                    <td><input type="text" name="time_id" size="12"></td>
                    <td><input type="text" name="time" size="7"></td>
                    <td><input type="number" name="route" size="3"></td>
                    <td><input type="number" name="start" size="3"></td>
                    <td><input type="submit" value="Add"></td>
                    <td><input type="reset" value="Cancel"></td>
                </form>
              </table>

              <?php
                include ('connectdatabase.php');
                if (!$conn){
                    die("Connection failed: " . mysqli_connect_error());
                } else {
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $routeid = $_POST['car_route_id'];
                    $start = $_POST['startid'];
                    $driver = $_POST['Driver_ID'];
                    $vehicle = $_POST['vehicle_registration'];
                    $dated = $_POST['date_of_driving_circle'];
                    $timeid = $_POST['time_id'];
                    
                    $sql = "INSERT INTO `driving_cycle` (driving_cycle_id,car_route_id, stratid, Driver_ID, vehicle_registration, date_of_driving_circle, time_id,remaining_tickets) VALUES (NULL,'$routeid', '$start','$driver','$vehicle','$dated','$timeid',Default)";
                        if (mysqli_query($conn, $sql)) {
                            echo "New record created successfully";
                        // header('Location:showBorrowing.php');
                        } else {
                        echo "Error: ". mysqli_error($conn);
                        }              
                    }
                }
                mysqli_close($conn);
            ?>
           
          </div>
        </div>
        </div>