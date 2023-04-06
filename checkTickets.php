<?php 
include_once 'connectdatabase.php';

$data_id = (isset($_POST['data_id']) && ($_POST['data_id'] != 0 )) ? $_POST['data_id'] : '';

if($data_id!=0){
    $sql = "SELECT * FROM `reserve` inner join `ticket` on `reserve`.Ticket_ID = `ticket`.Ticket_ID inner join `passenger` on `reserve`.Passenger_ID = `passenger`.Passenger_ID";
} else {
    $sql = "SELECT * FROM `reserve` inner join `ticket` on `reserve`.Ticket_ID = `ticket`.Ticket_ID inner join `passenger` on `reserve`.Passenger_ID = `passenger`.Passenger_ID";
}
$result = mysqli_query($conn, $sql);
$num_row = mysqli_num_rows($result);
while ($row = mysqli_fetch_assoc($result))
{
  $data[] = array( "name" => $row['NameP'],
                    "getin" => $row['broding_point_id'],
                    "getoff" => $row['drop_off_id'],                  
            );
    $num_row--;
}

echo json_encode($data);
mysqli_close($conn);
exit();
?>