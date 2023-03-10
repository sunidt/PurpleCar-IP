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
                    <a href="changeDricycle.php" class="nav-item nav-link">แก้ไขรอบรถ</a>
                    <a href="datadrivers.php" class="nav-item nav-link active">แก้ไขข้อมูลคนขับรถ</a>
                    <div class="nav-item dropdown">
                        </div>
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
    <div class="container d-flex flex-column align-items-center justify-content-center" align="center">
    <div class="page-heading normal-space"> 
    <div class="col-lg-12">
      <div class="container">
          <div class="col-lg-12">
                <div class="item">
                  <div class="row">
                    <!--<div class="current-bid">ต้องเปลี่ยนใน css--> 
                      <div class="col-lg-12">
                        <span class="mini-heading"><h4>แก้ไขข้อมูลคนขับรถ</h4></span>
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
                          <option value="red">สายสีแดง</option>
                      </select>
                  </fieldset>

                </div> -->
              <br>
              <table width='100%' >
                <tr>
                    <th>รหัสคนขับ</th>
                    <th>ชื่อ-นามสกุล</th>
                    <th>เพศ</th>
                    <th>วัน/เดือน/ปีเกิด</th>
                    <th>ชื่อผู้ใช้</th>
                    <th>รหัสผ่าน</th>
                    <th>เบอร์โทรศัพท์</th>
                    <th>เลขที่ใบขับขี่</th>
                    <th></th><th></th>
                </tr>
                    <?php
                        include('connectdatabase.php');
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        } else {
                            $sql = "SELECT * FROM `driver`";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $car_reservation = $row["Driver_ID"];
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $row["Driver_ID"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["NameD"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["sex"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["Date_of_Birth"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["Username"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["PasswordD"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["Number_Phone"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["Driver_license_no"];
                                    echo "</td>";
                                    ?>
                                    <td><button class="form-control" data-toggle="modal" href=edit/editformdriver.php" data-target="#theModal" onclick="window.location='edit/editformdriver.php?id=<?php echo $row["Driver_ID"];?>'">Edit</button></td>
                                    <td><button class="form-control" onclick="JavaScript:if(confirm('Confirm Delete?')==true){window.location='delete/deletedriver.php?id=<?php echo $row["Driver_ID"];?>';}">Delete</button></td>
                                    <?php
                                    echo "</tr>";
                                }
                            }
                        }
                    ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                    <td></td>
                    <td><input type="text" class="form-select form-control" name="named" size="20"></td>
                    <td><fieldset>
                        <select name="sex" class="form-select form-control" size="" aria-label="Default select example" id="getIn" onchange="this.form.click()">
                            <option value="Male" >Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </fieldset></td>
                    <td><input type="date" class="form-select form-control" name="date"></td>
                    <td><input type="text" class="form-select form-control" name="username" size="10"></td>
                    <td><input type="password" class="form-select form-control" name="passwordd" size="20"></td>
                    <td><input type="text" class="form-select form-control" name="numphone" size="10"></td>
                    <td><input type="text" class="form-select form-control" name="driverno" size="8"></td>
                    <td><input type="submit" class="form-select form-control" value="Add"></td>
                    <td><input type="reset" class="form-select form-control" value="Cancel"></td>
                </form>
              </table>
              <?php
                include ('connectdatabase.php');
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
                    
                    $sql = "INSERT INTO `driver` (Driver_ID,NameD, sex, Date_of_Birth, Username, PasswordD, Number_Phone,Driver_license_no) VALUES (NULL,'$named', '$sex','$date','$username','$passwordd','$numphone','$driverno')";
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