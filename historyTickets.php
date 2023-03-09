<?php
    ob_start();
    session_start();
    if($_SESSION['UserID']==""){
        header("Location:login.php");
    }
?>
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
                    <a href="bookTickets.php" class="nav-item nav-link">จองตั๋ว</a>
                    <a href="historyTickets.php" class="nav-item nav-link active">ประวัติการจอง</a>
                    <a href="login.php" class="nav-item nav-link">ออกจากระบบ</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">ประวัติการจองตั๋วรถม่วง</h3>
            <div class="d-inline-flex text-white">

            </div>
        </div>
    </div>
    <!-- Header End -->
    
<div class="container-fluid pt-5">
    <div class="container pb-3">
        <?php
        include('connectdatabase.php');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            $sql = "SELECT * FROM `passenger` WHERE Username = '".$_SESSION['UserID']."' ";
            $result = mysqli_query($conn, $sql);
            if (mysqli_num_rows($result) == 1){
            while($row = mysqli_fetch_assoc($result)){
                echo $row["NameP"];
                echo " : แต้มสะสม ";
                echo $row["Points"];
                $userid = $row["Passenger_ID"];
                }
            }
        }
        ?>


<table width='100%'>
    <tr>
    <th>รหัสผู้โดยสาร</th>
    <th>รหัสตั๋ว</th>
    <th>ราคาตั๋ว</th>
    <th>จุดขึ้นรถ</th>
    <th>จุดลงรถ</th>
    <th>วันที่จอง</th>
    <th>เวลา</th>
    </tr>

        <?php
        include('connectdatabase.php');
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        } else {
            $sql = "SELECT * FROM `reserve` WHERE Passenger_ID = '$userid' ";
            $query = mysqli_query($conn,$sql);
            $result = mysqli_fetch_array($query, MYSQLI_ASSOC);
            if ($sql){
                $sql1 = "SELECT * FROM `ticket` inner join `reserve` on `ticket`.Ticket_ID = `reserve`.Ticket_ID  inner join `parking_spot` on `ticket`.drop_off_id = `parking_spot`.car_reservation_code inner join `driving_cycle` on `ticket`.Driving_cycle_ID = `driving_cycle`.Driving_cycle_ID  WHERE Passenger_ID = '$userid' ";
                $result = mysqli_query($conn, $sql1);
                if (mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_assoc($result)){
                        $broding_point_id = $row["broding_point_id"];
                        $car_reservation_code = $row["car_reservation_code"];
                        $drop_off_id = $row["drop_off_id"];
                            echo "<tr>";
                            echo "<td>";
                            echo $row["Passenger_ID"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["Ticket_ID"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["Ticket_Price"];
                            echo "</td>";
                            echo "<td>";
                                if($broding_point_id == 1){
                                    echo "บขส.2";
                                }else{
                                    echo "มหาวิทยาลัยนเรศวร";
                                }
                            echo "</td>";
                            echo "<td>";
                            echo $row["Parking_place_name"];
                            echo "</td>";
                            echo "<td>";
                            echo $row["bookDate"];
                            echo "</td>";
                            echo "<td>";
                                echo $row["time_id"];
                            echo "</td>";
                           
                    }
                }
            }   
        }
        
                echo "</table>";
                mysqli_close( $conn );
    ?>



      
    </div>
</div>


    <!-- Footer Start -->
?
    <!-- Footer End -->


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