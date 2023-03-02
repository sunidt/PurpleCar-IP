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
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="index1.php" class="nav-item nav-link">หน้าแรก</a>
                    <a href="checkTicketsforDrivers.php" class="nav-item nav-link active">เช็คการจองตั๋วรถ(ของคนขับ)</a>
                    <a href="login.php" class="nav-item nav-link">ออกจากระบบ</a>
                    <div class="nav-item dropdown">
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <!-- <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">เช็คการจองตั๋วรถ(ของคนขับ)</h3>
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
                    <th>รายชื่อผู้โดยสาร</th>
                    <th>จุดขึ้นรถ</th>
                    <th>จุดลงรถ</th>
                </tr>

    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">เช็คการจองตั๋วรถ(ของคนขับ)</h1>
            </div>
        </div>      
        <h5>วันที่วิ่งรถ</h5>
        <input type="date" id="datecar">
        <div id="result"></div>
                </form>
                <h5>เวลา</h5>
                <form action="http://devtai.com/">
                    <select name="old"> 
                        <option value="volvo">06:40</option>
                        <option value="saab">07:00</option>
                        <option value="fiat">08:05</option>
                        <option value="audi">08:25</option>
                        <option value="audi">09:00</option>
                        <option value="audi">09:25</option>
                        <option value="audi">10:25</option>
                        <option value="audi">10:35</option>
                        <option value="audi">11:50</option>
                        <option value="audi">12:20</option>
                        <option value="audi">13:15</option>
                        <option value="audi">13:35</option>
                        <option value="audi">14:40</option>
                        <option value="audi">15:00</option>
                        <option value="audi">16:05</option>
                        <option value="audi">16:25</option>
                        <option value="audi">17:30</option>
                    </select>
                    <b></b>
                    <h5>สายรถ</h5>
                <form action="http://devtai.com/"> 
                    <select name="old"> 
                        <option value="volvo">สายสีฟ้า</option>
                        <option value="saab">สายสีแดง</option>
                        </select>
                    <br><br>

                </form>
                <?php
                        include('connectdatabase.php');
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        } else {
                            $sql = "SELECT * FROM `reserve` inner join `ticket` on `reserve`.Ticket_ID = `ticket`.Ticket_ID inner join `passenger` on `reserve`.Passenger_ID = `passenger`.Passenger_ID ";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_assoc($result)){
                                    $car_reservation = $row["Passenger_ID"];
                                    echo "<tr>";
                                    echo "<td>";
                                    echo $row["NameP"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["broding_point_id"];
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["drop_off_id"];
                                    echo "</td>";
                                    echo "<td>";
                                }
                            }
                        }
                    ?>