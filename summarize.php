<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ระบบจองตั๋วรถม่วงออนไลน์</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

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
    <link rel="stylesheet" href="node_modules/bootstrap/dist/css/bootstrap.min.css">
    <style>
        .flex-container {
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: #F5F8FF;
        }
        .text-pink {
            color: #FF5656;
        }
    </style>
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
                    <a href="summarize.php" class="nav-item nav-link active">สรุปประวัติการจอง</a>
                    <a href="changeParkingSpot.php" class="nav-item nav-link">แก้ไขจุดจอดรถ</a>
                    <a href="changeTime.php" class="nav-item nav-link">แก้ไขเวลาวิ่งรถ</a>
                    <a href="changeDricycle.php" class="nav-item nav-link">แก้ไขรอบรถ</a>
                    <a href="datadrivers.php" class="nav-item nav-link">แก้ไขข้อมูลคนขับรถ</a>
                    </div>
                </div>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- หัวเรื่อง -->
    <!-- <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 400px">
            <h3 class="display-3 font-weight-bold text-white">สรุปประวัติการจอง</h3>
            <div class="d-inline-flex text-white">
            </div>
        </div>
    </div> -->
    <!-- หัวเรื่อง  End -->
    <div class="container-fluid pt-5 pb-3">
        <div class="container">
            <div class="text-center pb-2">
                
            </div>
            <div class="row">
                <div class="col-12 text-center mb-2">
                    <ul class="list-inline mb-4" id="portfolio-flters">

<!-- ส่วนของกราฟ bar -->
    <head>
	<title>สรุปประวัติการจอง</title>
	<link href="node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
	<div class="container-fluid">
		<h1 class="text-center my-4">สรุปประวัติการจอง</h1>
		<div id="salesbtn" class="d-flex justify-content-center">
			<button class="btn btn-secondary mx-2" onclick="selectReport('day.php', this, 'line')">วัน</button>
			<button class="btn btn-outline-secondary mx-2" onclick="selectReport('month.php', this, 'line')">เดือน</button>
            <button class="btn btn-outline-secondary mx-2" onclick="selectReport('year.php', this, 'line')">ปี</button><!-- ดึงข้อมูลจากโฟร์เดอร์ Service -->
            <button class="btn btn-outline-secondary mx-2" onclick="selectReport('broding_point_id.php', this, 'pie')">จุดขึ้นรถ</button>
			<button class="btn btn-outline-secondary mx-2" onclick="selectReport('dropoff.php', this, 'pie')">จุดลงรถ</button>
            <button class="btn btn-outline-secondary mx-2" onclick="selectReport('gender.php', this, 'pie')">เพศ</button>
            <button class="btn btn-outline-secondary mx-2" onclick="selectReport('time.php', this, 'bar')">เวลา</button>
		</div>
		<div class="">
			<canvas id="myChart" height="400px"></canvas>
		</div>
	</div>

	<script src="node_modules/jquery/dist/jquery.min.js"></script>
	<script src="node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
	<script>
		let myChart;

		/** function สำหรับเลือกการออกรายงาน */
		function selectReport(endpoint, el, type){
			setActive(el);
			myChart.destroy();
			renderChart(endpoint, type);
		}

		/** function สำหรับ active ปุ่มกด */
		function setActive(_this){
			$('#salesbtn button').removeClass('btn-secondary').addClass('btn-outline-secondary');
			$(_this).addClass('btn-secondary').removeClass('btn-outline-secondary');
		}

		/** function สำหรับสร้างกราฟด้วย Chart.js */
		function renderChart(endpoint, type = 'bar') {  
			/*
			endpoint คือ ปลายทาง API ที่เราจะเรียกข้อมูล    
			type คือ รูปแบบการแสดงผลของกราฟ
			*/

			/** เริ่มต้นโดยการ request ไปยัง API ปลายทางที่เราเลือก*/
			$.ajax({  
				type: "GET",  
				url: "service/" + endpoint 
			}).done(function(data) {  

				/** สร้าง กราฟตามที่ตั้งค่าไว้ */
				myChart = new Chart($('#myChart'), {
					type: type,
					data: {
						labels: data.response.labels,
						datasets: [{
							label: data.response.label,
							data: data.response.results,
							borderWidth: 3
						}]
					},
                    
					options: {
						maintainAspectRatio: false,
						responsive: true,  
						scales: {
							y: {
								beginAtZero: true
							}
						}
					}
				});
			})
		};

		/** กำหนดให้ กราฟรายวันขึ้นก่อนเมื่อเปิด */
		renderChart('day.php', 'line') 
    
	</script>
<!-- จบส่วนของกราฟ bar -->
             
<!-- ---------------------------------------------------------------------------------------------------------------------------------------------------------------------- -->



<body>

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

</body>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
</body>

</html>