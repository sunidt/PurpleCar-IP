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
                <span class="text-primary">ระบบจองตั๋วรถม่วงออนไลน์</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                </div>
                <a href="index1.php" class="btn btn-primary px-4 active" style="font-size: 20px;">Home</a>
                <a href="signup.php" class="btn btn-primary px-4" style="font-size: 20px;">Signup</a>
                <a href="login.php" class="btn btn-primary px-4" style="font-size: 20px;">Login</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <!-- <h3 class="display-3 font-weight-bold text-white">ระบบจองตั๋วรถม่วงออนไลน์</h3> -->
            <h4 style="color: white;">บริษัท คิงด้อม ออโต้คาร์พิษณุโลก จำกัด <br>
                สถานีขนส่งผู้โดยสารจังหวัดพิษณุโลก แห่งที่ 2 <br>
                เลขที่ 888 หมู่ 7 ตำบล สมอแข</h4>
        </div>
    </div>
    <!-- Header End -->


    <!-- Class Start --> 
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">ตารางเดินรถ</h1>
            </div>
            <div class="row d-flex flex-column align-items-center justify-content-center">
                <div class="col-lg-10 mb-10">
                    <div class="card border-0 bg-light shadow-sm pb-2">
                        <table width='100%' align="center" class="table table-hover">
                        <tr style="background-color: rgb(255, 255, 255);">
                            <th>เที่ยวที่</th>
                            <th colspan="2">เวลาออกจากมหาวิทยาลัยนเรศวร</th>
                            <th>เที่ยวที่</th>
                            <th colspan="2">เวลาออกจากสถานีขนส่งฯ แห่งที่ 2</th>
                        </tr>
                        <?php
                        include('connectdatabase.php');
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        } else {
                            $sql = "SELECT * FROM `departure_time`";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0){
                                $i = 1;
                                $r = [];
                                $start = [];
                                while($row = mysqli_fetch_assoc($result)){
                                    $car_reservation = $row["time_id"];
                                    $start = str_split($row["start_NU_TC"]);
                                    if ($start[0] == 1){
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $i;
                                        echo "</td>";
                                        echo "<td>";
                                        echo substr(($row["time"]) ,0,5);
                                        echo "</td>";
                                        $r = str_split($row["route_b_r"]);
                                        if ($r[0] == 1 ) {
                                            echo "<td style='color:blue'>";
                                            echo "ผ่านสถานีรถไฟ";
                                        }
                                        else{
                                            echo "<td style='color:red'>";
                                            echo "ผ่านเซนทรัล";
                                        }   
                                        echo "</td>";
                                    }
                                    if ($start[1] == 1){
                                        echo "<td>";
                                        echo $i;
                                        echo "</td>";
                                        echo "<td>";
                                        echo substr(($row["time"]) ,0,5);
                                        echo "</td>";
                                        $r = str_split($row["route_b_r"]);
                                        if ($r[0] == 1 ) {
                                            echo "<td style='color:blue'>";
                                            echo "ผ่านสถานีรถไฟ";
                                        }
                                        else{
                                            echo "<td style='color:red'>";
                                            echo "ผ่านเซนทรัล";
                                        }   
                                        echo "</td>";
                                    }
                                    
                                    echo "</tr>";
                                    $i = $i+1;
                                }
                            }
                        }
                    ?>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Class End -->
    <!-- Register start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
            <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="text-center p-4">
                            <h1 class="text-black m-0" style="color: blue;">สายสีฟ้า</h1><br>
                            <?php
                        include('connectdatabase.php');
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        } else {
                            $sql = "SELECT * FROM `parking_spot`";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0){
                                $r = [];
                                while($row = mysqli_fetch_assoc($result)){
                                    $spot = $row["car_reservation_code"];
                                    $r = str_split($row["route_b_r"]);
                                        if ($r[0] == 1 ) {
                                            // echo "<td style='color:blue' style="font-size:30px">";
                                            echo $row["Parking_place_name"];
                                            echo " ";
                                        }
                                }
                            }
                        }
                    ?>
                        </div>
                    </div>
                </div>

                <div class="col-lg-5">
                    <div class="card border-0">
                        <div class="text-center p-4">
                            <h1 class="text-black m-0" style="color: red;">สายสีแดง</h1><br>
                            <?php
                            include('connectdatabase.php');
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            } else {
                                $sql = "SELECT * FROM `parking_spot`";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0){
                                    $r = [];
                                    while($row = mysqli_fetch_assoc($result)){
                                        $car_reservation = $row["car_reservation_code"];
                                        $r = str_split($row["route_b_r"]);
                                            if ($r[1] == 1 ) {
                                                echo $row["Parking_place_name"];
                                                echo " ";
                                            }
                                    }
                                }
                            }
                           ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Registration Start -->
    
    <!-- Registration End -->

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