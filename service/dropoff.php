<?php
/**
 **** AppzStory Chart.js PHP REST API ****
 * Report
 * 
 * @link https://appzstory.dev
 * @author Yothin Sapsamran (Jame AppzStory Studio)
 */
header('Content-Type: application/json');

/**
| ส่วนนี่ เป็นส่วนที่ให้เราเขียน SQL เพื่อดึงข้อมูล การออกรายงานจากฐานข้อมูล
| เมื่อได้ข้อมูลมาแล้ว ให้เราเขียนลอจิก ในการสร้าง array แต่ละชุด
| เมื่อได้ array ตามแพทเทิลที่วางไว้แล้ว ก็นำมาใส่แทนชุดข้อมูลด้านล่างนี้
 */
include('../connectdatabase.php');

date_default_timezone_set('Asia/Bangkok');
$year = date("Y");
$mounth = date("m");

// echo $year;
// echo $mounth;
// echo gettype($mounth);
$startyear = 2022;
$i = $startyear;
$labels = array();
$resultdata = array();
// $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
// while($i <= $year){
    
    $dropoff = array();
    $resultdata = array();
    $data = array();
    // include 'connectdatabase.php';
    for ($p = 1; $p <= 15; $p++) {
        $sql = "SELECT * FROM `parking_spot` WHERE `car_reservation_code` = $p";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($dropoff,$row['Parking_place_name']);
                // echo $row['Parking_place_name'].":";
            }
        }
        // array_push($dropoff,$p);
        $sql = "SELECT COUNT(drop_off_id) FROM `ticket` RIGHT JOIN `reserve` ON `ticket`.`Ticket_ID` = `reserve`.`Ticket_ID` WHERE `drop_off_id` = $p";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($resultdata,$row['COUNT(drop_off_id)']);
                // echo " ".$row['COUNT(drop_off_id)']."  ";
            }
        }
        // array_push($data,"['".$dropoff[$p-1]."'".", ".$resultdata[$p-1]."]");
    }
    $cparking = count($dropoff);

// $strMonthCut = array("", "", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "2022", "2023");
$response = [
    'status' => true,
    'response' => [
        'label' => 'จุดลงรถ',
        'labels' => $dropoff, 
        'results' => $resultdata
    ],
    'message' => 'OK'
];
http_response_code(200);
echo json_encode($response);