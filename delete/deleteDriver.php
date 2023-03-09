<html>
<head>
<title>Delete Time</title>
</head>
<body>
<?php
  include('../connectdatabase.php');
  if (isset($_GET['id'])){
    $id = $_GET['id'];
    $delete = mysqli_query($conn, "DELETE FROM `driver` WHERE Driver_ID = '$id'");
    header("location:../datadrivers.php");
  }
  $query = mysqli_query($conn, $select);
?>
</body>
</html>