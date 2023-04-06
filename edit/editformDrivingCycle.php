<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Driving Cycle Edit Form</title>
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
    <link href="../lib/flaticon/font/flaticon.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/lightbox/css/lightbox.min.css" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="../css/style.css" rel="stylesheet">
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
                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav font-weight-bold mx-auto py-0">
                        <a href="../index1.php" class="nav-item nav-link">หน้าแรก</a>
                        <a href="../summarize.php" class="nav-item nav-link">สรุปประวัติการจอง</a>
                        <a href="../changeParkingSpot.php" class="nav-item nav-link">แก้ไขจุดจอดรถ</a>
                        <a href="../changeTime.php" class="nav-item nav-link">แก้ไขเวลาวิ่งรถ</a>
                        <a href="../changeDricycle.php" class="nav-item nav-link active">แก้ไขรอบรถ</a>
                        <a href="../datadrivers.php" class="nav-item nav-link">แก้ไขข้อมูลคนขับรถ</a>
                        <div class="nav-item dropdown">
                           
                            </div>
                        </div>
                        
                    </div>
                    
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <!-- <div class="container-fluid bg-primary px-0 px-md-5 mb-5">
        <div class="row align-items-center px-3">
            <div class="col-lg-6 text-center text-lg-centered d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
                <h4 class="text-white mb-4 mt-5 mt-lg-0"></h4>
                <h1 class="display-3 font-weight-bold text-white ">Driving Cycle Edit Form</h1>
                
            </div>

        </div>
    </div> -->
    <!-- Header End -->


    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container pb-3">
            <div class="row">
                <?php
                include('../connectdatabase.php');      
                if(isset($_GET["id"]))
                {
                    $id = $_GET["id"];
                 }    
                $sql = "SELECT * FROM `driving_cycle` WHERE driving_cycle_id = '$id'";
                $query = mysqli_query($conn,$sql);
                $result = mysqli_fetch_array($query, MYSQLI_ASSOC);   
            ?>
            <form method="POST" action="editDrivingCycle.php" name = "frmAdd" style="text-align:center;width:100%;">
                รหัสรอบรถ : <input type="hidden" class="form-select form-control" name="drivid" value="<?php echo $result["driving_cycle_id"];?>"><?php echo $result["driving_cycle_id"];?><br><br>
                รหัสสายรถ <input type="number" class="form-select form-control" name="routeid" size="2" value="<?php echo $result["car_route_id"];?>"><br>
                รหัสจุดขึ้นรถ <input type="number" class="form-select form-control" name="start" size="3" value="<?php echo $result["stratid"];?>"><br>
                รหัสคนขับ <input type="number" class="form-select form-control" name="driver" size="3" value="<?php echo $result["Driver_ID"]?>"><br>
                ทะเบียนรถ <input type="text" class="form-select form-control" name="vehicle" size="7" value="<?php echo $result["vehicle_registration"]?>"><br>
                วันที่วิ่งรถ <input type="date" class="form-select form-control" name="date" value="<?php echo $result["date_of_driving_circle"]?>"><br>
                รหัสเวลา <input type="text" class="form-select form-control" name="time" size="4" value="<?php echo $result["time_id"]?>"><br>
                จำนวนตั๋วที่เหลือ <input type="number" class="form-select form-control" name="remainTickets" size="2" value="<?php echo $result["remaining_tickets"]?>"><br>
            <input type="submit" value="Edit" style="width:100px;height:40px;border-radius: 15px ;background-color: white;color: black ">
            <input type="reset" value="Cancel" style="width:100px;height:40px;border-radius: 15px ;background-color: white;color: black ">
            </form>
            </div>
        </div>
    </div>
    <!-- Facilities Start -->













    <!-- Footer Start -->
    <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
        
        <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, .2);;">

        </div>
    </div>
    <!-- Footer End -->




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