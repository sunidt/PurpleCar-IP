<html>
<head>
<title>Delete Driving Cycle</title>
</head>
<body>
<?php
  include('../connectdatabase.php');
  if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM `driving_cycle` WHERE driving_cycle_id = '$id'");
    header("location:../changeDricycle.php");
  }
  $query = mysqli_query($conn, $select);
?>
</body>
</html>
