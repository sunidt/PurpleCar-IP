<?php
  session_start();
  include('connectdatabase.php');

  $login="SELECT * FROM `passenger` WHERE `Username` = '".$_POST['uname']."' AND `PasswordP` = '".$_POST['pw']."'";
  $query_login=mysqli_query($conn,$login);
  $num_login=mysqli_num_rows($query_login);
  $result_login=mysqli_fetch_assoc($query_login);

  if($num_login==true){
    $_SESSION['UserID']=$result_login['Username'];
  
    header('Location:bookTickets.php');
  }
  else{
    $login="SELECT * FROM `driver` WHERE `Username` = '".$_POST['uname']."' AND `PasswordD` = '".$_POST['pw']."'";
    $query_login=mysqli_query($conn,$login);
    $num_login=mysqli_num_rows($query_login);
    $result_login=mysqli_fetch_assoc($query_login);
    
    if($num_login==true){
      $_SESSION['UserID']=$result_login['Name'];
      
      header('Location:checkTicketsforDrivers.php');
    }
    else{
      header('Location:login.php');
    }
  }
?>