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

    <!-- Facilities Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h1 class="mb-4">เช็คการจองตั๋วรถ(ของคนขับ)</h1>
            </div>
        </div>    
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
        <br><br>
        <h5>รอบรถ</h5>
        <select class="form-select form-control" aria-label="Default select example" id="select_data">
                <option value="0" selected>รอบรถ</option>
                <?php $sql = "SELECT DISTINCT driving_cycle_id FROM driving_cycle ORDER BY driving_cycle_id ASC";
                    $result = mysqli_query($conn, $sql);
                    $num_row = mysqli_num_rows($result);
                    while ($row = mysqli_fetch_assoc($result))
                    { ?>
                        <option value="<?php echo $row['driving_cycle_id'];?>"><?php echo $row['driving_cycle_id']; ?></option>
               <?php } ?>
            </select>

        <table width='100%'>
            <thead>
                <tr>
                    <th>รายชื่อผู้โดยสาร</th>
                    <th>จุดขึ้นรถ</th>
                    <th>จุดลงรถ</th>
                </tr>
            </thead>
            <tbody id="table-body">
                        
            </tbody>
        </table>
<script>
    jQuery(function($) {

        data_ajax(0);

        $("#select_data").change(function() {
            var select_data = $(this).val();
            data_ajax(select_data);
        });

    });

   function data_ajax(data) {
        $.ajax({
                url: "checkTickets.php",
                type: "POST" ,
                dataType: "json",
                data: {data_id : data},
            success: function(data){
                $("#table-body").empty();
                console.log(data);
                $.each(data, function(index, record) {
                    var row = $("<tr></tr>");
                    var cell1 = $("<td>" + record.name + "</td>");
                    var cell2 = $("<td>" + record.getin + "</td>");
                    var cell3 = $("<td>" + record.getoff + "</td>");
                    row.append(cell1, cell2, cell3);
                    $("#table-body").append(row);
                });

            }
            });
   }
</script>
</body>
</html>