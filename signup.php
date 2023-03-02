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
                <span class="text-primary">ระบบจองตั๋วรถม่วงออนไลน์</span>
            </a>
            <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                <div class="navbar-nav font-weight-bold mx-auto py-0">
                </div>
                <a href="index1.php" class="btn btn-primary px-4" style="font-size: 20px;">Home</a>
                <a href="signup.php" class="btn btn-primary px-4 active" style="font-size: 20px;">Signup</a>
                <a href="login.php" class="btn btn-primary px-4" style="font-size: 20px;">Login</a>
            </div>
        </nav>
    </div>
    <!-- Navbar End -->


    <!-- Header Start -->
    <div class="container-fluid bg-primary mb-5">
        <div class="d-flex flex-column align-items-center justify-content-center" style="min-height: 200px">
            <h3 class="display-3 font-weight-bold text-white">Signup</h3>
            <div class="d-inline-flex text-white">
            </div>
        </div>
    </div>
    <!-- Header End -->


    <!-- Contact Start -->
    <div class="container-fluid pt-5 d-flex flex-column align-items-center justify-content-center"  >
        <div class="container d-flex flex-column align-items-center justify-content-center" >
            <div class="row d-flex flex-column align-items-center justify-content-center"align="center" >
                <div class="col-lg-7 mb-5" align="center">
                    <div class="contact-form" >
                        <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                            <div class="control-group" >
                                <h5 class="display-3 font-weight-bold text-black" style="font-size: 20px;">Name</h5>
                                <input type="text" size="100"  name="name" class="form-control" id="name" placeholder="Name" required="required" data-validation-required-message="Please enter your name" />
                            </div><br>
                            <div class="control-group" >
                                <h5 class="display-3 font-weight-bold text-black" style="font-size: 20px;">Username</h5>
                                <input type="text"  name="username"class="form-control" id="username" placeholder="Username" required="required" data-validation-required-message="Please enter your username" />
                            </div><br>
                            <div class="control-group">
                                <h5 class="display-3 font-weight-bold text-black" style="font-size: 20px;"  >Password</h5>
                                <input type="password" name="password" class="form-control" id="password" placeholder="Password" required="required" data-validation-required-message="Please enter your password" />
                            </div><br>
                            <div class="control-group">
                                <h5 class="display-3 font-weight-bold text-black" style="font-size: 20px;"  >Date</h5>
                                <input type="date" class="form-control" name="date" id="date" placeholder="Password" required="required" data-validation-required-message="Please enter your date" />
                            </div><br>
                            <div class="control-group">
                                <h5 class="display-3 font-weight-bold text-black" style="font-size: 20px;"  >Telephone Number</h5>
                                <input type="int" class="form-control" name="numphone" id="numphone" placeholder="telephone number" required="required" data-validation-required-message="Please enter your phone number" />
                            </div><br>
                            <div class="control-group">
                                <h5 class="display-3 font-weight-bold text-black" style="font-size: 20px;"  >Gender</h5>
                                <select class="custom-select border-0 px-4" style="height: 47px;" required="required" id="sex" name="sex">
                                    <option selected>Select A Gender</option>
                                    <option value="Male">Male</option>
                                    <option value="Female">Female</option>
                                </select>
                            </div>
                            <!-- <br>
                            <div class="control-group">
                                <h5 class="display-3 font-weight-bold text-black" style="font-size: 20px;"  >Driver License Number</h5>
                                <input type="int" class="form-control" name="Driver License Number" id="Driver License Number" placeholder="Driver License Number"  />
                            </div>
                            <br>
                            <h6>*please wait for confirmation before login</h6>
                            <br> -->
                            <div>
                                <button class="btn btn-primary py-2 px-4" type="submit" id="signup">Signup</button>
                            </div>
                        </form>
                        <?php
                            include ('connectdatabase.php');
                            if (!$conn){
                                die("Connection failed: " . mysqli_connect_error());
                            }else {
                                 if ($_SERVER['REQUEST_METHOD'] == 'POST'){
                                    $passengerid = $_POST['passengerid'];
                                    $name = $_POST['name'];
                                    $sex = $_POST['sex'];
                                    $date = $_POST['date'];
                                    $username = $_POST['username'];
                                    $password = $_POST['password'];
                                    $numphone = $_POST['numphone'];
                                    $Points = $_POST['Points'];
                                    $sql = "INSERT INTO `passenger` (Passenger_ID, NameP, sex, Date_of_Birth, Username, PasswordP, Number_Phone, Points) VALUES ('$passengerid','$name','$sex','$date','$username','$password','$numphone','$Points')";
                                        if (mysqli_query($conn, $sql)) {
                                            echo "สมัครสมาชิกเรียบร้อยแล้ว";
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
        </div>
    </div>
    <!-- Contact End -->

        <!-- Footer Start -->
        <div class="container-fluid bg-secondary text-white mt-5 py-5 px-sm-3 px-md-5">
            <div class="row pt-5">
                <div class="col-lg-3 col-md-6 mb-5">
                    <a href="" class="navbar-brand font-weight-bold text-primary m-0 mb-4 p-0" style="font-size: 40px; line-height: 40px;">
                        <i ></i>
                        <span class="text-white"></span>
                    </a>
                    <p>   </p>
                    <div class="d-flex justify-content-start mt-4">
    
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                </div>
                <div class="col-lg-3 col-md-6 mb-5">
                </div>
            </div>
            <div class="container-fluid pt-5" style="border-top: 1px solid rgba(23, 162, 184, .2);;">
                <p class="m-0 text-center text-white">
                </p>
            </div>
        </div>
        <!-- Footer End -->


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