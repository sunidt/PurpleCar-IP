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
                    <a href="changeTime.php" class="nav-item nav-link">แก้ไขเวลาวิ่งรถ</a>
                    <a href="changeDricycle.php" class="nav-item nav-link active">แก้ไขรอบรถ</a>
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
            <h3 class="display-3 font-weight-bold text-white">purple car</h3>
            <div class="d-inline-flex text-white">
                
            </div>
        </div>
    </div> -->
    <!-- Header End -->

 <!-- Registration Start -->
 <div class="container-fluid py-5 d-flex flex-column align-items-center justify-content-center" align="center">
    <div class="container d-flex flex-column  align-items-center justify-content-center" align="center">
    <div class="page-heading normal-space " align="center"> 
    <div class="col-lg-12 ">
      <div class="container ">
          <div class="col-lg-12 container d-flex flex-column  align-items-center justify-content-center" align="center">
                <div class="item">
                  <div class="row">
                    <!--<div class="current-bid">ต้องเปลี่ยนใน css--> 
                      <div class="col-lg-12">
                        <span class="mini-heading"><h4>แก้ไขรอบรถ</h4></span>
                      </div>
                    <!--</div>-->
                  </div>
                </div>
              <br>
                <!-- <div class="col-lg-3">
                  <fieldset>
                      <select name="Category" class="form-select" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                          <option selected>สายรถ</option>
                          <option value="blue">สายสีฟ้า</option>
                          <option value="red">สายสีแดง</option cellpadding = "6" cellspacing = "0">
                      </select>
                  </fieldset>

                </div> -->
                <p align="rigth">สายรถที่ 1 คือสายสีฟ้า สายรถที่ 2 คือสายสีแดง </p>
                <p align="rigth">สายจุดขึ้นรถ 1 คือ บขส2 สายรถที่ 9 คือ มหาวิทยาลัยนเรศวร </p>

              <br>
              <table style="width:125%" >
                <tr align="center">
                    <th style="width:8%">รหัสรอบรถ</th>
                    <th>รหัสสายรถ</th>
                    <th>รหัสจุดขึ้นรถ</th>
                    <th>รหัสคนขับ</th>
                    <th>ทะเบียนรถ</th>
                    <th>ปี/เดือน/วัน ที่รอบรถวิ่งรถ</th>
                    <th>รหัสเวลา</th>
                    <th>จำนวนตั๋วที่เหลือ</th>
                    <th></th><th></th>
                </tr>
                    <?php
                        include('connectdatabase.php');
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        } else {
                            $sql = "SELECT * FROM `driving_cycle` inner join `driver` on `driving_cycle`.Driver_ID = `driver`.Driver_ID ORDER BY driving_cycle_id ASC";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $drivingid = $row["driving_cycle_id"];
                                    ?>
                                    <tr>
                                    <td align="center"><?php echo $row["driving_cycle_id"]; ?></td>
                                    <td align="center"><?php echo $row["car_route_id"]; ?></td>
                                    <td align="center"><?php echo $row["stratid"]; ?></td>
                                    <td align="center"><?php echo $row["Driver_ID"]; echo"  ";  echo $row["NameD"]; ?></td>
                                    <td align="center"><?php echo $row["vehicle_registration"]; ?></td>
                                    <td align="center"><?php echo $row["date_of_driving_circle"]; ?></td>
                                    <td align="center"><?php echo $row["time_id"]; ?></td>  
                                    <td align="center"><?php echo $row["remaining_tickets"]; ?></td>                           
                                    <td ><button data-toggle="modal" class="form-control" href=edit/editformDrivingCycle.php" data-target="#theModal" onclick="window.location='edit/editformDrivingCycle.php?id=<?php echo $row["driving_cycle_id"];?>'">Edit</button></td>
                                    <td><button class="form-control" onclick="JavaScript:if(confirm('Confirm Delete?')==true){window.location='delete/deleteDrivingCycle.php?id=<?php echo $drivingid;?>';}">Delete</button></td>
                                    </tr>
                                    <?php
                                }
                            }
                        }
                        ?>
                    
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <td></td>
                    <td><input align="center" type="text" class="form-control" name="car_route_id" size="8" placeholder= "1 , 2"></td>
                    <td><input align="center" type="text" class="form-control" name="startid"  style="width: 175px" size="3" placeholder= "1 , 9"></td>
                    <td><input align="center" type="text" class="form-control" name="Driver_ID" style="width: 175px" size="3" placeholder= "0"></td>
                    <td><input align="center" type="text" class="form-control" name="vehicle_registration" size="13" placeholder= "ฮฮ-0000"></td>
                    <td><input align="center" type="date" class="form-control" name="date_of_driving_circle" style="width: 200px" size="20"></td>
                    <td><input align="center" type="text" class="form-control" name="time_id" size="8" placeholder= "0000"></td>
                    <td style="width: 140px"></td>
                    <td><input type="submit" class="form-control"  value="Add"></td>
                    <td><input type="reset" class="form-control" value="Cancel"></td>
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
  </div>
                
           
   

    <!-- Back to Top -->
    <a href="#" class="btn btn-primary p-3 back-to-top"><i class="fa fa-angle-double-up"></i></a>


    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.bundle.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/isotope/isotope.pkgd.min.js"></script>
    <script src="lib/lightbox/js/lightbox.min.js"></script>

    <!-- Contact Javascript File -->
    <script src="mail/jqBootstrapValidation.min.js"></script>
    <script src="mail/contact.js"></script>

    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>