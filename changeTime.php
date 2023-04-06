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
                    <a href="changeParkingSpot.php" class="nav-item nav-link">แก้ไขจุดจอดรถ</a>
                    <a href="changeTime.php" class="nav-item nav-link active">แก้ไขเวลาวิ่งรถ</a>
                    <a href="changeDricycle.php" class="nav-item nav-link">แก้ไขรอบรถ</a>
                    <a href="datadrivers.php" class="nav-item nav-link">แก้ไขข้อมูลคนขับรถ</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <!-- <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">แก้ไขเวลาเดินรถ</h3>
            <div class="d-inline-flex text-white">
            </div>
        </div>
    </div> -->
    <!-- Header End -->

<!-- 
    About Start
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
    
    
              
    <!-- Facilities Start --> 
    <div class="container-fluid py-5 d-flex flex-column align-items-center justify-content-center" align="center">
    <div class="container d-flex flex-column align-items-center justify-content-center" align="center">
    <div class="page-heading normal-space"> 
    <div class="col-lg-12">
        <div class="container">
            <div class="col-lg-12 container d-flex flex-column  align-items-center justify-content-center" align="center">
                <div class="item">
                  <div class="row">
                    <!--<div class="current-bid">ต้องเปลี่ยนใน css--> 
                      <div class="col-lg-12">
                        <span class="mini-heading"><h4>แก้ไขเวลาวิ่งรถ</h4></span>
                      </div>
                    <!--</div>-->
                  </div>
                </div>
              <br>
            <!-- <div class="container">
                <div class="text-center pb-2">
                    <div class="col-lg-3">
                        <fieldset>
                            <select name="Category" class="form-select" aria-label="Default select example" id="chooseCategory" onchange="this.form.click()">
                                <option selected>สายรถ</option>
                                <option type="checkbox" name="option1" value="blue">สายสีฟ้า</option>
                                <option value="red">สายสีแดง</option>
                            </select>
                        </fieldset>
                      </div>
                    <br>
                </div>
            </div> -->
            <p align="rigth">สายรถที่ 10 คือสายสีฟ้า สายรถที่ 01 คือสายสีแดง </p>
            <p align="rigth">จุดเริ่มต้น 11 คือ มหาวิทยาลัยนเรศวร/บขส2 </p>
            <table width='100%'>
                
                <tr>
                    <th >รหัสเวลา</th>
                    <th >เวลา</th>
                    <th>สายรถ</th>
                    <th>จุดเริ่มต้น</th>
                    <th></th><th></th>
                </tr>

            <?php
                        include('connectdatabase.php');
                        if (!$conn) {
                            die("Connection failed: " . mysqli_connect_error());
                        } else {
                            $sql = "SELECT * FROM `departure_time`";
                            $result = mysqli_query($conn, $sql);
                            if (mysqli_num_rows($result) > 0){
                                $r = [];
                                $start = [];

                                while($row = mysqli_fetch_assoc($result)){
                                         ?>                              
                                    <tr>
                                    <td ><?php echo $row["time_id"]; ?></td>
                                    <td ><?php echo substr(($row["timeT"]) ,0,5); ?></td>
                                    <?php
                                    $r = str_split($row["route_b_r"]);
                                        if ($r[0] == 1 ) {
                                            echo "<td style='color:blue '  >";
                                            echo "สายสีฟ้า";
                                        }
                                        else{
                                            echo "<td style='color:red'>";
                                            echo "สายสีแดง";
                                        }   
                                        echo "</td>";
                                    echo "<td>";
                                    $start = str_split($row["start_NU_TC"]);
                                    if($start[0] == 1 && $start[1] == 1){
                                        echo "มหาวิทยาลัยนเรศวร/บขส.2";
                                    }  
                                    echo "</td>";
                                    ?>
                                    <td><button class="form-control" data-toggle="modal" href=edit/editformTime.php" data-target="#theModal" onclick="window.location='edit/editformTime.php?id=<?php echo $row["time_id"];?>'">Edit</button></td>
                                    <td><button class="form-control" onclick="JavaScript:if(confirm('Confirm Delete?')==true){window.location='delete/deleteTime.php?id=<?php echo $row["time_id"];?>';}">Delete</button></td>
                                    <?php
                                    echo "</tr>";
                                }
                                
                            }
                        }
                    ?>
                <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>"><br>
                    
                    <td align="center"><input class="form-control" type="text" name="time_id" size="12" placeholder= "0000"></td>
                    <td align="center"><input class="form-control" type="text" name="timeT" pattern="[0-9]{2}[:][0-9]{2}" size="7" placeholder= "00:00"></td>
                    <td align="center"><input class="form-control" type="text" name="route_b_r" pattern="[0-9]{2}" size="5" placeholder= "10, 01"></td>
                    <td align="center"><input class="form-control" type="text" name="start_NU_TC" pattern="[0-9]{2}" size="20" placeholder= "11"></td>
                    <td><input class="form-control" type="submit" value="Add"></td>
                    <td><input class="form-control" type="reset" value="Cancel"></td>
                </form>
              </table>

              <?php
                include ('connectdatabase.php');
                if (!$conn){
                    die("Connection failed: " . mysqli_connect_error());
                } else {
                    if ($_SERVER['REQUEST_METHOD'] == "POST") {
                    $time_id = $_POST['time_id'];
                    $timeT = $_POST['timeT'];
                    $route_b_r = $_POST['route_b_r'];
                    $start_NU_TC = $_POST['start_NU_TC'];
                    
                    
                    $sql = "INSERT INTO `departure_time` (time_id,timeT,route_b_r,start_NU_TC) VALUES ('$time_id','$timeT','$route_b_r','$start_NU_TC')";
                        if (mysqli_query($conn, $sql)) {
                            echo "New record created successfully";
                        // header('Location:showBorrowing.php');
                        } else {
                        echo "Error: ". mysqli_error($conn);
                        }              
                    }
                }
                mysqli_close($conn);
            ?>
           
          </div>
        </div>
        </div>