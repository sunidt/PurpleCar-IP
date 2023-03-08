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
                    <a href="bookTickets.php" class="nav-item nav-link active">จองตั๋ว</a>
                    <a href="historyTickets.php" class="nav-item nav-link">ประวัติการจอง</a>
                    <a href="logout.php" class="nav-item nav-link">ออกจากระบบ</a>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">จองตั๋วรถม่วง</h3>
            <div class="d-inline-flex text-white">
               
            </div>
        </div>
    </div>
    <!-- Header End -->



    <div class="page-heading">
        <div class="container">
          <div class="row">
            <div class="col-lg-12">
              <!-- <h6>Liberty NFT Market</h6> -->

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
              <!-- <p align = right class="mini-heading">แต้มสะสม : 100 แต้ม</p> -->
              <!-- <span>Home > <a href="#">Explore</a></span> -->
            </div>
          </div>
        </div>
   
        

    <!-- Team Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h6 style="font-size: 40px;">จุดขึ้นรถ</h6>
                <!-- <fieldset> -->
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <select name="GetIn" class="form-select form-control" aria-label="Default select example" id="getIn" onchange="this.form.click()">
                <?php
                    include('connectdatabase.php');
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        } else {
                            $sql = "SELECT * FROM `parking_spot` WHERE `car_reservation_code` = 1 or `car_reservation_code` = 9";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0){
                                while($row = mysqli_fetch_array($result)){
                                    // $carrecode = $row['car_reservation_code'];
                                    ?>
                                        <option value=<?php echo $row["car_reservation_code"] ?> selected><?php echo $row["Parking_place_name"] ?></option>
                                    <?php
                                }
                            }
                        }
                ?>
                </select>

                <h6 style="font-size: 40px;">จุดลงรถ</h6>
                <fieldset>
                    <select name="GetOff" class="form-select form-control" aria-label="Default select example" id="getOff" onchange="this.form.click()">
                    <?php
                        include('connectdatabase.php');
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            } else {
                                $sql = "SELECT * FROM `parking_spot`";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                    ?>
                                        <option value=<?php echo $row["car_reservation_code"] ?> selected><?php echo $row["Parking_place_name"] ?></option>
                                    <?php
                                }
                            }
                        }
                    ?>
                    </select>
                </fieldset>
                <br>
                <h6 style="font-size: 40px;">วันที่เดินทาง</h6>
                <input type="date" name="goDate" class="form-select form-control" aria-label="Default select example" id="goDate" onchange="this.form.click()">
                <h6 style="font-size: 40px;">เที่ยวไป/เวลา</h6>
                <fieldset>
                    <select name="goTime" class="form-select form-control" aria-label="Default select example" id="goTime" onchange="this.form.click()">
                    <?php
                        include('connectdatabase.php');
                            if (!$conn) {
                                die("Connection failed: " . mysqli_connect_error());
                            } else {
                                $sql = "SELECT * FROM `departure_time`";
                                $result = mysqli_query($conn, $sql);
                                if (mysqli_num_rows($result) > 0){
                                    while($row = mysqli_fetch_array($result)){
                                    ?>
                                        <option value=<?php echo $row["time_id"] ?> selected><?php echo substr(($row["time"]) ,0,5) ?></option>
                                    <?php
                                }
                            }
                        }
                    ?>
                    </select>
                </fieldset>
                <br>
                <fieldset>
                    <div>
                        <button class="btn btn-primary btn-block border-0 py-3" type="submit">เช็ครอบรถ</button>
                    </div>
                </fieldset>
                </form>
                <?php
                include ('connectdatabase.php');
                if (!$conn){
                    die("Connection failed: " . mysqli_connect_error());
                } else {
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $getin = $_POST['GetIn'];
                    $getoff = $_POST['GetOff'];
                    $godate = $_POST['goDate'];
                    $gotime = $_POST['goTime'];
                    // $numtickets = $_POST['numtickets'];
                    // echo $getin;
                    // echo $getoff;
                    // echo $godate;
                    // echo $gotime;
                    
                    $sql = "SELECT * FROM `driving_cycle` WHERE `stratid` = '$getin' and `date_of_driving_circle` = '$godate' and `time_id` = '$gotime'";
                    $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_array($result)){
                            echo $row['driving_cycle_id'];
                        }
                    } else {
                        echo "ไม่มีรอบรถ";
                    }
                    }
                }
                mysqli_close($conn);
            ?>

                <h6 style="font-size: 40px;">จำนวนตั๋ว</h6>
                <fieldset>
                    <select name="numtickets" class="form-select form-control" aria-label="Default select example" id="getIn" onchange="this.form.click()">
                        <option value="1">1</option>
                        <option value="2">2</option>
                        <option value="3">3</option>
                        <option value="4">4</option>
                        <option value="5">5</option>
                        <option value="6">6</option>
                        <option value="7">7</option>
                        <option value="8">8</option>
                        <option value="9">9</option>
                        <option value="10">10</option>
                        <option value="11">11</option>
                        <option value="12">12</option>
                        <option value="13">13</option>
                        <option value="14">14</option>
                        <option value="15">15</option>
                        <option value="16">16</option>
                        <option value="17">17</option>
                        <option value="18">18</option>
                    </select>
                </fieldset>
                <br>
                <fieldset>
                    <div>
                        <button class="btn btn-primary btn-block border-0 py-3" type="submit">จอง</button>
                    </div>
                </fieldset>
              </div>
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