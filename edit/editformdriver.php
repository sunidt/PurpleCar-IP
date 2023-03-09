<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Driver Edit Form</title>
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
                        <a href="index.html" class="nav-item nav-link">หน้าแรก</a>
                        <a href="about.html" class="nav-item nav-link">สรุปประวัติการจอง</a>
                        <a href="about.html" class="nav-item nav-link ">แก้ไขจุดจอดรถ</a>
                        <a href="about.html" class="nav-item nav-link">แก้ไขเวลาวิ่งรถ</a>
                        <a href="../changDricycle.php" class="nav-item nav-link">แก้ไขรอบรถ</a>
                        <a href="datadrivers.php" class="nav-item nav-link active">แก้ไขข้อมูลคนขับรถ</a>
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
    <div class="container-fluid pt-5 " align="center">
        <div class="container pb-3 "align="center" >
            <div class="row ">
                <?php
                include('../connectdatabase.php');      
                if(isset($_GET["id"]))
                {
                    $id = $_GET["id"];
                 }    
                $sql = "SELECT * FROM `driver` WHERE Driver_ID = '$id'";
                $query = mysqli_query($conn,$sql);
                $result = mysqli_fetch_array($query, MYSQLI_ASSOC);   
            ?>
            
            <form method="POST" action="editdriver.php" name = "frmAdd" style="text-align:center;width:100%;">
                <br><div class="form-select form-control">
                รหัสคนขับ : <input  type="hidden" name="driverid" value="<?php echo $result["Driver_ID"];?>"><?php echo $result["Driver_ID"];?><br></div><br>
                ชื่อ-นามสกุล : <input class="form-select form-control" type=" text" name="named" value="<?php echo $result["NameD"];?>"><br>
                เพศ <fieldset>
                        <select class="form-select form-control" name="sex"  size="" value="<?php echo $result["sex"];?><?php echo $result["sex"];?> " >
                            <option value="Male" >Male</option>
                            <option value="Female">Female</option>
                        </select>
                    </fieldset>
                    <br>
                วัน/เดือน/ปีเกิด <input class="form-select form-control" type="date" name="date" size="10" value="<?php echo $result["Date_of_Birth"];?>"><br>
                ชื่อผู้ใช้ <input class="form-select form-control" type="text" name="username" size="15" value="<?php echo $result["Username"];?>"><br>
                รหัสผ่าน <input class="form-select form-control" type="password" name="passwordd" size="15" value="<?php echo $result["PasswordD"];?>"><br>
                เบอร์โทรศัพท์ <input class="form-select form-control" type="text" name="numphone" size="10" value="<?php echo $result["Number_Phone"];?>"><br>
                เลขที่ใบขับขี่ <input class="form-select form-control" type="text" name="driverno" size="8" value="<?php echo $result["Driver_license_no"];?>"><br>
                 
                
                    <input  type="submit" value="Edit" style="width:100px;height:40px">
                    
                    <input  type="reset" value="Cancel" style="width:100px;height:40px">
                   
            </form>
            </div>
        </div>
    </div>
    
    <!-- Facilities Start -->


















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