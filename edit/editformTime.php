<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Time Edit Form</title>
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
                        <a href="../historyTickets.php" class="nav-item nav-link">สรุปประวัติการจอง</a>
                        <a href="../changeParkingSpot.php" class="nav-item nav-link">แก้ไขจุดจอดรถ</a>
                        <a href="../changeTime.php" class="nav-item nav-link active">แก้ไขเวลาวิ่งรถ</a>
                        <a href="../changeDricycle.php" class="nav-item nav-link ">แก้ไขรอบรถ</a>
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
                $sql = "SELECT * FROM `departure_time` WHERE time_id = '$id'";
                $query = mysqli_query($conn,$sql);
                $result = mysqli_fetch_array($query, MYSQLI_ASSOC);   
            ?>
            <form method="POST" action="editTime.php" name = "frmAdd">
                รหัสเวลา : <input type="hidden" name="time_id" value="<?php echo $result["time_id"];?>"><?php echo $result["time_id"];?><br><br>
                เวลา : <input type="hidden" name="timeT" value="<?php echo $result["timeT"];?>"><?php echo $result["timeT"];?><br><br>
                สายรถ : <input type="text" pattern="[0-9]{2}" name="route_b_r" size="10" value="<?php echo $result["route_b_r"];?>"><br><br>
                จุดเริ่มต้น : <input type="text" pattern="[0-9]{2}" name="start_NU_TC" size="10" value="<?php echo $result["start_NU_TC"]?>"><br><br>
            <input type="submit" value="Edit">
            <input type="reset" value="Cancel">
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