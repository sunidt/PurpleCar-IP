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
                    <a href="changeParkingSpot.php" class="nav-item nav-link active">แก้ไขจุดจอดรถ</a>
                    <a href="changeTime.php" class="nav-item nav-link">แก้ไขเวลาวิ่งรถ</a>
                    <a href="changeDricycle.php" class="nav-item nav-link">แก้ไขรอบรถ</a>
                    <a href="datadrivers.php" class="nav-item nav-link">แก้ไขข้อมูลคนขับรถ</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- หัวเรื่อง Start -->
    <!-- <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">แก้ไขจุดจอดรถ</h3>
        
        </div>
    </div> -->
    <!-- หัวเรื่อง End -->

    <div class="page-heading normal-space"> 
        <div class="col-lg-12">
          <div class="container">
              <div class="col-lg-12">
                  <form id="contact" action="" method="post">
                    <div class="item">
                      <div class="row">
                       
                          <div class="col-lg-12">
                            
                          </div>
                      </div>
                    </div>
                  <br>

                  <!--ปุ่ม -->
                    </div>
                    <div class="row">
                        <div class="col-12 text-center mb-2">
                            <ul class="list-inline mb-4" id="portfolio-flters">
                                <div class="text-center pb-2">
                                    <p class="section-title px-5"><span class="px-2">แก้ไขจุดจอดรถ</span></p>
                                    
                                </div>
                                <li class="btn btn-outline-primary m-1" data-filter=".first">สายรถ</li>
                                <li class="btn btn-outline-primary m-1" data-filter=".blue">สายสีฟ้า</li>
                                <li class="btn btn-outline-primary m-1" data-filter=".red">สายสีแดง</li>
                            </ul>
                        </div>
                    </div>
                  <br>
                <!--ปุ่ม end -->

                  <table width='100%'>
                    <tr>
                        <th>รหัสจุดจอดรถ</th>
                        <th>ชื่อสถานที่จุดจอดรถ</th>
                        <th>สายรถ</th>
                        <th></th><th></th>
                    </tr>
                        <?php
                            include('connectdatabase.php');
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            } else {
                                $sql = "SELECT * FROM `parking_spot`";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_assoc($result)){
                                        // $car_reservation = $row["car_reservation_code"];
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $row["car_reservation_code"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["Parking_place_name"];
                                        echo "</td>";
                                        echo "<td>";
                                        echo $row["route_b_r"];
                                        echo "</td>";
                                        // echo "<td>";
                                        // echo $row["red"];
                                        // echo "</td>";
                                        echo "<td>";
                                        echo "<button>Edit</button";
                                        echo "</td>";
                                        echo "<td>";
                                        echo "<button>Delete</button";
                                        echo "</td>";
                                        echo "</tr>";
                                    }
                                }
                            }
                        ?>
                    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                        <td><input type="text" name="carreid" size="3" required></td>
                        <td><input type="text" name="parkname" size="20"></td>
                        <td><input type="text" name="route" size="3"></td>
                        <td><input type="submit" value="Add"></td>
                        <td><input type="reset" value="Cancel"></td>
              </form>
                  </table>
                </form>
              </div>
          </div>
        </div>
      </div>
    

  
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