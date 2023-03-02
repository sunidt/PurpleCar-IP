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
                    <a href="login.php" class="nav-item nav-link">ออกจากระบบ</a>
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
              <p align = right class="mini-heading">แต้มสะสม : 100 แต้ม</p>
              <!-- <span>Home > <a href="#">Explore</a></span> -->
            </div>
          </div>
        </div>
   
        

    <!-- Team Start -->
    <div class="container-fluid pt-5">
        <div class="container">
            <div class="text-center pb-2">
                <h6 style="font-size: 40px;">จุดขึ้นรถ</h6>
                <fieldset>
                    <select name="GetIn" class="form-select" aria-label="Default select example" id="getIn" onchange="this.form.click()">
                        <option value="NU" selected>มหาวิทยาลัยนเรศวร</option>
                        <!-- <option value="BKS1">บขส. 1</option> -->
                        <option value="BKS2">บขส. 2</option>
                        <!-- <option value="BigC">บิ๊กซี</option>
                        <option value="Satit">ม.สาธิต</option>
                        <option value="Malabiang">มาลาเบี่ยง</option>
                        <option value="BudhHospital">รพ. พุทธ</option>
                        <option value="TrainStation">สถานีรถไฟ</option>
                        <option value="Macro">แมคโคร</option>
                        <option value="LotusTonwha">โลตัสต้นหว้า</option>
                        <option value="Chollapratan">ชลประทาน</option>
                        <option value="Topland">ท็อปแลนด์</option>
                        <option value="WatYai">วัดใหญ่</option>
                        <option value="BanKlong">บ้านคลอง</option>
                        <option value="Central">เซ็นทรัล</option> -->
                    </select>
                </fieldset>
                <h6 style="font-size: 40px;">จุดลงรถ</h6>
                <fieldset>
                    <select name="GetOff" class="form-select" aria-label="Default select example" id="getIn" onchange="this.form.click()">
                        <option value="NU">มหาวิทยาลัยนเรศวร</option>
                        <option value="BKS1">บขส. 1</option>
                        <option value="BKS2" selected>บขส. 2</option>
                        <option value="BigC">บิ๊กซี</option>
                        <option value="Satit">ม.สาธิต</option>
                        <option value="Malabiang">มาลาเบี่ยง</option>
                        <option value="BudhHospital">รพ. พุทธ</option>
                        <option value="TrainStation">สถานีรถไฟ</option>
                        <option value="Macro">แมคโคร</option>
                        <option value="LotusTonwha">โลตัสต้นหว้า</option>
                        <option value="Chollapratan">ชลประทาน</option>
                        <option value="Topland">ท็อปแลนด์</option>
                        <option value="WatYai">วัดใหญ่</option>
                        <option value="BanKlong">บ้านคลอง</option>
                        <option value="Central">เซ็นทรัล</option>
                    </select>
                </fieldset>
                <br>
                
                <h6 style="font-size: 40px;">เที่ยวไป/เวลา</h6>
                <fieldset>
                    <select name="goTime" class="form-select" aria-label="Default select example" id="getIn" onchange="this.form.click()">
                        <option value="1">06.40 น.</option>
                        <option value="2">07.00 น.</option>
                        <option value="3">08.05 น.</option>
                        <option value="4">08.25 น.</option>
                        <option value="5">09.00 น.</option>
                        <option value="6">09.25 น.</option>
                        <option value="7">10.25 น.</option>
                        <option value="8">10.35 น.</option>
                        <option value="9">11.50 น.</option>
                        <option value="10">12.20 น.</option>
                        <option value="11">13.15 น.</option>
                        <option value="12">13.35 น.</option>
                        <option value="13">14.40 น.</option>
                        <option value="14">15.00 น.</option>
                        <option value="15">16.05 น.</option>
                        <option value="16">16.25 น.</option>
                        <option value="17">17.30 น.</option>
                    </select>
                </fieldset>
                <!-- <h6>เที่ยวกลับ/เวลา</h6>
                <fieldset>
                    <select name="backTime" class="form-select" aria-label="Default select example" id="getIn" onchange="this.form.click()">
                        <option value="0">ไม่ซื้อตั๋วกลับ</option>
                        <option value="1">06.40 น.</option>
                        <option value="2">07.00 น.</option>
                        <option value="3">08.05 น.</option>
                        <option value="4">08.25 น.</option>
                        <option value="5">09.00 น.</option>
                        <option value="6">09.25 น.</option>
                        <option value="7">10.25 น.</option>
                        <option value="8">10.35 น.</option>
                        <option value="9">11.50 น.</option>
                        <option value="10">12.20 น.</option>
                        <option value="11">13.15 น.</option>
                        <option value="12">13.35 น.</option>
                        <option value="13">14.40 น.</option>
                        <option value="14">15.00 น.</option>
                        <option value="15">16.05 น.</option>
                        <option value="16">16.25 น.</option>
                        <option value="17">17.30 น.</option>
                    </select>
                </fieldset> -->
                <h6 style="font-size: 40px;">จำนวนตั๋ว</h6>
                <fieldset>
                    <select name="tickets" class="form-select" aria-label="Default select example" id="getIn" onchange="this.form.click()">
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