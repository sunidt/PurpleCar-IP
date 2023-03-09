<html>
<head>
<title>Delete Time</title>
</head>
<body>
<?php
  include('../connectdatabase.php');
  if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM `departure_time` WHERE time_id = '$id'");
    header("location:../changeTime.php");
  }
  $query = mysqli_query($conn, $select);
?>
</body>
</html>