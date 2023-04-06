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
                <!--<i class="flaticon-043-teddy-bear"></i>-->
                <span class="text-primary">ระบบจองตั๋วรถม่วงออนไลน์</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="index1.php" class="nav-item nav-link">หน้าแรก</a>
                    <a href="pay.php" class="nav-item nav-link active">ชำระเงิน</a>
                    <a href="bookTickets.php" class="nav-item nav-link">จองตั๋ว</a>
                    <a href="historyTickets.php" class="nav-item nav-link">ประวัติการจอง</a>
                    <a href="logout.php" class="nav-item nav-link">ออกจากระบบ</a>
                    <div class="nav-item dropdown">
                        <!--<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Pages</a>
                        <div class="dropdown-menu rounded-0 m-0">
                            <a href="blog.html" class="dropdown-item">Blog Grid</a>
                            <a href="single.html" class="dropdown-item">Blog Detail</a>
                        </div>-->
                    </div>
                    <!--<a href="contact.html" class="nav-item nav-link">Contact</a>-->
                </div>
               <!-- <a href="" class="btn btn-primary px-4">Join Class</a>-->
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <!--<div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">ชำระเงิน</h3>
            <div class="d-inline-flex text-white">
                <p class="m-0"><a class="text-white" href="">Home</a></p>
                <p class="m-0 px-2">/</p>
                <p class="m-0">ชำระเงิน</p>
            </div>
        </div>
    </div>-->
    <!-- Header End -->


    <!-- About Start -->
    <div class="container-fluid py-5">
        <div class="container">
            <div class="row align-items-center">
                <div class="col-lg-5">
                    <img class="img-fluid rounded mb-5 mb-lg-0" src="img/qrcode.png" alt="">
                </div>
                <div class="col-lg-7">
                <?php
                    include('connectdatabase.php');
                    if (!$conn) {
                        die("Connection failed: " . mysqli_connect_error());
                    } else {
                        $sql = "SELECT * FROM `passenger` WHERE Username = '".$_SESSION['UserID']."' ";
                        $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) == 1){
                            while($row = mysqli_fetch_assoc($result)){
                            $nameu = $row['NameP'];
                            echo $row["NameP"];
                            echo " : แต้มสะสม ";
                            echo $row["Points"];
                            $point = $row['Points'];
                            $userid = $row["Passenger_ID"];
                            date_default_timezone_set('Asia/Bangkok');
                            $today = date("Y-m-d");
                            }
                        }
                    }
                ?>
                <?php
                    $drivecycleid = $_POST['driveCycleID'];
                    $numtics = $_POST['numtickets'];
                    $getin = $_POST['GetIn'];
                    $getoff = $_POST['GetOff'];
                    $gotime = $_POST['goTime'];
                    $godate = $_POST['goDate'];
                    $i = 1;
                    while($i <= $numtics) {
                        $sql = "INSERT INTO `ticket` (`Ticket_ID`, `Driving_cycle_ID`, `Ticket_Price`, `broding_point_id`, `drop_off_id`) VALUES (NULL, '$drivecycleid', '35', '$getin', '$getoff')";
                        $result = mysqli_query($conn, $sql);
                        $i = $i+1;
                    }
                    $i = $i-2;
                    $sql = "SELECT * FROM `driving_cycle` WHERE `driving_cycle_id` = '$drivecycleid'";
                    $result = mysqli_query($conn, $sql);
                        if (mysqli_num_rows($result) > 0){
                            while($row = mysqli_fetch_array($result)){
                                // $drivecycleid = $row['driving_cycle_id']; 
                                $remainticket = $row['remaining_tickets'];
                                // echo $remainticket;
                            }
                        }
                    $remain = $remainticket - $numtics;
                    $sqlup = "UPDATE `driving_cycle` SET `remaining_tickets` = '$remain' WHERE `driving_cycle_id` = '$drivecycleid'";
                    $result = mysqli_query($conn, $sqlup);
                ?>
                    <br>
                    <p class="section-title pr-5"><span class="pr-2">HI</span></p>
                    <h1 class="mb-4">ชำระเงิน</h1>
                    <table border="1" bordercolor="#ff0000">
                        <tr>
                            <!-- <th>ชื่อ</th> -->
                            <th>รหัสตั๋ว</th>
                            <!-- <th>สายรถ</th> -->
                            <th>จุดขึ้นรถ</th>
                            <th>จุดลงรถ</th>
                            <th>วันที่</th>
                            <th>เวลา</th>
                            <th>ราคา</th>
                        </tr>
                            <?php
                             $sql = "SELECT MAX(`Ticket_ID`) FROM `ticket`";
                             $result = mysqli_query($conn, $sql);
                                 if (mysqli_num_rows($result) > 0){
                                     while($row = mysqli_fetch_array($result)){
                                        // echo "<td>";
                                        $maxid = $row['MAX(`Ticket_ID`)'];
                                        // echo "</td>"; 
                                     }
                                 }
                            
                            $ticketsid = array();
                            while($i >= 0){
                                $id = $maxid-$i;
                                $sql = "SELECT * FROM `ticket` inner join `parking_spot` ON `ticket`.`drop_off_id` = `parking_spot`.`car_reservation_code` WHERE `Ticket_ID` = '$id'";
                                $result = mysqli_query($conn, $sql);
                                 if (mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                        echo "<tr>";
                                        echo "<td>";
                                        echo $row['Ticket_ID'];
                                        // $ttt = $row['Ticket_ID'];
                                        echo "</td>"; 
                                        array_push($ticketsid, $row['Ticket_ID']);
                                        echo "<td>";
                                        if ($row['broding_point_id']==1){
                                            echo "บขส. 2";
                                        }else{
                                            echo "มหาวิทยาลัยนเรศวร";
                                        }
                                        echo "</td>"; 
                                        echo "<td>";
                                        echo $row['Parking_place_name'];
                                        echo "</td>"; 
                                        echo "<td>";
                                        echo $godate;
                                        echo "</td>"; 
                                        echo "<td>";
                                        echo $gotime;
                                        echo "</td>"; 
                                        echo "<td>";
                                        echo $row['Ticket_Price'];
                                        echo "</td>"; 
                                        echo "</tr>";
                                     }
                                 }
                                 $i = $i-1;
                            }
                            ?>
                        </tr>
                    </table>
                    <?php 
                        $ctickets = count($ticketsid);
                        // echo $maxid; 
                        // echo $ticketsid[1];
                        // echo $ticketsid[2];
                    ?>
                    <br>
                    <fieldset>
                    <div>
                        <br>
                    <form method="post" action="addReserveMoney.php" enctype="multipart/form-data">
                        <input type="hidden" name="lastTicket" value="<?php echo $maxid; ?>">
                        <input type="hidden" name="numTicks" value="<?php echo $numtics; ?>">
                        <label for="fileReciept">อัปโหลดใบเสร็จจ่ายเงิน (จะได้แต้มสะสม <?php echo $numtics; ?> แต้ม)</label>
                        <input type="file" name="fileReciept" id="fileReciept" required>
                        <br><br>
                        <button class="btn btn-primary btn-block border-0 py-3" type="submit">จ่ายเงิน <?php echo $numtics*35; ?> บาท</button>
                    </form>
                    </div>
                    <br><br>
                    <?php 
                        if($point >= $numtics*35){
                    ?>
                    <div>
                    <form method="post" action="addReservePoints.php">
                        <p align="center">หรือ</p>
                        <input type="hidden" name="lastTicket" value="<?php echo $maxid; ?>">
                        <input type="hidden" name="numTicks" value="<?php echo $numtics; ?>">
                        <input type="hidden" name="fileReciept" id="fileReciept" value="img/points.png">
                        <!-- <br> -->
                        <button class="btn btn-primary btn-block border-0 py-3" type="submit">จ่ายด้วยแต้มสะสม <?php echo $numtics*35; ?> แต้ม</button>
                    </form>
                    </div>
                    <?php } ?>
                    </fieldset>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->

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