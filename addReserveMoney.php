<?php
    ob_start();
    session_start();
    if($_SESSION['UserID']==""){
        header("Location:login.php");
    }
?>
<?php
    include('connectdatabase.php');
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    } else {
        $sql = "SELECT * FROM `passenger` WHERE Username = '".$_SESSION['UserID']."' ";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) == 1){
        while($row = mysqli_fetch_assoc($result)){
        $nameu = $row['NameP'];
        echo $row["NameP"];
        echo " : แต้มสะสม ";
        echo $row["Points"];
        $point = $row['Points'];
        $userid = $row["Passenger_ID"];
        date_default_timezone_set('Asia/Bangkok');
        $today = date("Y-m-d");
            }
        }
    }
?>
<?php
    $maxid = $_POST['lastTicket'];
    $numticks = $_POST['numTicks']-1;
    $fileReciept = $_POST['fileReciept'];
    echo $numticks;
    $ticketsid = array();
    while($numticks >= 0){
        $id = $maxid-$numticks;
        array_push($ticketsid, $id);
        $numticks = $numticks-1;
    }
    $ctickets = count($ticketsid);
    echo $ctickets;
    
    //upload image
    $ext = pathinfo(basename($_FILES['fileReciept']['name']), PATHINFO_EXTENSION);
    $imagename = (string)$maxid.".".$ext;
    $image_path = "receipt/";
    $upload_path = $image_path.$imagename;
    //uploading
    $seccess = move_uploaded_file($_FILES['fileReciept']['tmp_name'], $upload_path);
    if ($seccess==false){
        echo "Can not uploaded";
        exit();
    }else{
        echo "Uploaded";
    }
?>
<?php
    include ('connectdatabase.php');
        if (!$conn){
            die("Connection failed: " . mysqli_connect_error());
        } else {
            $t = 0;
            while($t < $ctickets){
                $sql = "INSERT INTO `reserve` (Passenger_ID, Ticket_ID, bookDate, receipt) VALUES ('$userid','$ticketsid[$t]','$today','$imagename')";
                if (mysqli_query($conn, $sql)) {
                    $plus = $point+$t+1;
                    $sqlup = "UPDATE `passenger` SET `Points`='$plus' WHERE Passenger_ID = '$userid' ";
                    mysqli_query($conn, $sqlup);
                            echo "จองสำเร็จ";
                            echo $ticketsid[$t];
                            // header('Location:showBorrowing.php');
                } else {
                    echo "Error: ". mysqli_error($conn);
                } 
                $t = $t+1;
            }      
                echo "ได้แต้มสะสมเพิ่ม ";
                echo $plus-$point;
                echo " แต้ม";
                header("location:historyTickets.php");
        }
    mysqli_close($conn);
?>