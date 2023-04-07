<?php
    ob_start();
    session_start();
    if($_SESSION['UserID']==""){
        header("Location:login.php");
    }
    require 'connectdatabase.php';


    $sql1 = "SELECT * FROM departure_time";
    $resultTime = mysqli_query($conn, $sql1);

    
    $sql2 = "SELECT * FROM route_car";
    $resultroute = mysqli_query($conn, $sql2);

    
    $sql3 = "SELECT *
    FROM driving_cycle
    INNER JOIN route_car
    ON driving_cycle.car_route_id = route_car.car_route_id
    INNER JOIN departure_time
    ON driving_cycle.time_id = departure_time.time_id";
    $result3 = mysqli_query($conn,$sql3);


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
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                    <a href="index1.php" class="nav-item nav-link">หน้าแรก</a>
                    <a href="checkTicketsforDrivers.php" class="nav-item nav-link active">เช็คการจองตั๋วรถ(ของคนขับ)</a>
                    <a href="logout.php" class="nav-item nav-link">ออกจากระบบ</a>
                    <div class="nav-item dropdown">
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- About Start -->
    <div class="container-fluid  pt-5 ">
        <div class="container"style="min-height:200px">
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
     <!-- Header Start -->
     <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h3 class="display-3 font-weight-bold text-white">เช็คการจองตั๋วรถ(ของคนขับ)</h3>
        </div>
    </div>
    <!-- Header End -->

    <!-- Facilities Start --> 
        <fieldset>
             <?php
                include('connectdatabase.php');
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {
                    $sql = "SELECT * FROM `driver` WHERE Username = '".$_SESSION['UserID']."' ";
                    $result = mysqli_query($conn, $sql);
                if (mysqli_num_rows($result) == 1){
                    while($row = mysqli_fetch_assoc($result)){
                        echo $row["NameD"];
                // echo " : ";
                // echo $row["Points"];
                        $userid = $row["Driver_ID"];
                        }
                    }
                }
                ?> 
        </fieldset>
        <br><br>
        <div class="container">
        <table class = "table table-striped mt-4 text-#000000 ">
        <tr class="bg-primary  font-weight-bold mx-auto " > 
        <form name="frmSearch" method="get" action="<?=$_SERVER['SCRIPT_NAME'];?>">
        <fieldset>
            <h5>วันที่วิ่งรถ</h5>
                <input type="date" id="datecar" name="datecar" class="form-control">
                    <!-- <div id="result"></div> -->
        </fieldset><br>
        <fieldset>
                <h5>เวลา</h5>
                    <b></b>
            <select class="form-control" id="timeT" name="timeT" onchange="myFun(this.value);">
            <option value="">-เลือกเวลา-</option>
            <?php foreach ($resultTime as $res1) {
                ?>
                <option value="<?php echo $res1["time_id"]; ?>">
                    <?php echo $res1["timeT"]; ?>
            <?php
                }
            ?>
              <br>
            </select>
        </fieldset><br>
        <!-- <div id="poll"> -->
                <!-- <h5>สายรถ</h5>
          <select class="form-control" id="routecar" name="routecar" onchange="myFun(this.value);">
                <option value="">-เลือกสายรถ-</option>
                    <?php foreach ($resultroute as $res2) {
                    ?>
                        <option value="<?php echo $res2["car_route_id"]; ?>">
                            <?php echo $res2["car_route_name"]; ?>
                    <?php
                        }
                    ?>
                <br>
                </select> -->
                <!-- <br> -->
                <div align="center">
                <input type="submit" value="Check" style="width:100px;height:40px;border-radius: 15px ;background-color: white;color: black ">
                </div>
            </form>
        </div>
        <br><br>
        
        <div class="row d-flex flex-column align-items-center justify-content-center">
        <div class="col-lg-10 mb-10">
            <div class="border-0 pb-2">    
               <h5> รอบรถ วันที่ - <?php echo $_GET["datecar"]; ?> - เวลา - <?php echo $_GET["timeT"]; ?> - </h5>
        <table width='100%' align="center" class="table table-hover">
        <div>        
                <tr align="center"bg-primary  font-weight-bold mx-auto width='100%' bg-primary  font-weight-bold mx-auto 
                 style="background-color: rgb(51, 204, 204); "width='100%'>
                    <th>รอบรถ</th>
                    <th>รายชื่อผู้โดยสาร</th>
                    <th>จุดขึ้นรถ</th>
                    <th>จุดลงรถ</th>
                </tr>
        

            <?php
                include('connectdatabase.php');
                if (!$conn) {
                    die("Connection failed: " . mysqli_connect_error());
                } else {
                    $sql = "SELECT * FROM `ticket` right join `reserve` on `ticket`.Ticket_ID = `reserve`.Ticket_ID inner join `passenger` on `reserve`.Passenger_ID = `passenger`.Passenger_ID inner join `driving_cycle` on `ticket`.`Driving_cycle_ID` = `driving_cycle`.`driving_cycle_id` WHERE (date_of_driving_circle LIKE '%".$_GET["datecar"]."%' and time_id LIKE '%".$_GET["timeT"]."%')";
                    $result = mysqli_query($conn, $sql);
                
                    if (mysqli_num_rows($result) > 0){
                        while($row = mysqli_fetch_assoc($result)){
                                    $car_reservation = $row["Passenger_ID"];
                                    $ticketid = $row["Ticket_ID"];
                                    echo "<tr>";
                                    echo "<td>";
                                    $sql1 = "SELECT * FROM `ticket` inner join `driving_cycle` ON `ticket`.Driving_cycle_ID = `driving_cycle`.Driving_cycle_ID WHERE Ticket_ID = $ticketid";
                                    $result1 = mysqli_query($conn, $sql1);
                                    if (mysqli_num_rows($result1) > 0){
                                        while($row1 = mysqli_fetch_assoc($result1)){
                                            echo $row1["Driving_cycle_ID"];
                                        }
                                    }
                                    echo "</td>";
                                    echo "<td>";
                                    echo $row["NameP"];
                                    echo "</td>";
                                    echo "<td>";
                                    // echo $row[""];
                                    if($row["broding_point_id"] == 1){
                                        echo "บขส.2";
                                    }else{
                                        echo "มหาวิทยาลัยนเรศวร";
                                    }
                                    echo "</td>";
                                    $dropoff = $row["drop_off_id"];
                                    echo "<td>";
                                    // echo $row["drop_off_id"];
                                    $sql2 = "SELECT * FROM `parking_spot` WHERE `car_reservation_code` = $dropoff";
                                    $result2 = mysqli_query($conn, $sql2);
                                    if (mysqli_num_rows($result2) > 0){
                                        while($row = mysqli_fetch_assoc($result2)){
                                            echo $row["Parking_place_name"];
                                        }
                                    }
                                    echo "</td>";
                                    // echo "<td>";
                                    echo "</tr>";
                        }
                    }
                }
            ?>
        </div>
    </table>
    
</div>
    <script>
      $(document).ready(function(){
      var current = 1,current_step,next_step,steps;
      steps = $("fieldset").length;
      $(".next").click(function(){
        current_step = $(this).parent();
        next_step = $(this).parent().next();
        next_step.show();
        current_step.hide();
        setProgressBar(++current);
      });
      $(".previous").click(function(){
        current_step = $(this).parent();
        next_step = $(this).parent().prev();
        next_step.show();
        current_step.hide();
        setProgressBar(--current);
      });
      setProgressBar(current);
      // Change progress bar action
      function setProgressBar(curStep){
        var percent = parseFloat(100 / steps) * curStep;
        percent = percent.toFixed();
        $(".progress-bar")
          .css("width",percent+"%")
          .html(percent+"%");
      }
    });
    </script>
      <script>
        function myFun(str) {
            if (window.XMLHttpRequest) {
                xmlhttp = new XMLHttpRequest();
            } else {
                xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
            }   

                xmlhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                document.getElementById('poll').innerHTML = this.responseText;
                }
            }
                xmlhttp.open("GET", "helpme.php?value=" + str, true);
                xmlhttp.send();
  }
</script>
</div>
</body>
</html>