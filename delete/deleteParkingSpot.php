<html>
<head>
<title>Delete Parking Spot</title>
</head>
<body>
<?php
  include('../connectdatabase.php');
  if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM `parking_spot` WHERE car_reservation_code = '$id'");
    header("location:../changeParkingSpot.php");
  }
  $query = mysqli_query($conn, $select);
?>
</body>
</html>