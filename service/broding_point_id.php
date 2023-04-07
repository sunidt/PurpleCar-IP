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

$startyear = 2022;
$i = $startyear;
$labels = array();
$resultdata = array();
$pickup = array(); // เพิ่ม array เก็บข้อมูลจุดขึ้นรถ
$data = array();

// สร้าง SQL query และวนลูปเพื่อดึงข้อมูลจากฐานข้อมูล
for ($p = 1; $p <= 15; $p++) {
    $sql = "SELECT * FROM `parking_spot` WHERE `car_reservation_code` = $p";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($pickup,$row['Parking_place_name']); // เก็บข้อมูลจุดขึ้นรถใน array
        }
    }

    $sql = "SELECT COUNT(broding_point_id) FROM `ticket` RIGHT JOIN `reserve` ON `ticket`.`Ticket_ID` = `reserve`.`Ticket_ID` WHERE `broding_point_id` = $p"; // เปลี่ยนเงื่อนไขเป็น pick_up_id
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($resultdata,$row['COUNT(broding_point_id)']); // เปลี่ยนเงื่อนไขเป็น COUNT(pick_up_id)
        }
    }
}

$cparking = count($pickup); // เปลี่ยนตัวแปรที่ใช้นับจำนวนข้อมูลเป็น pickup

$response = [
    'status' => true,
    'response' => [
        'label' => 'จุดขึ้นรถ', // เปลี่ยน label
        'labels' => $pickup, // เปลี่ยนตัวแปรที่ใช้เก็บข้อมูลจุดขึ้นรถ
        'results' => $resultdata
    ],
    'message' => 'OK'
];
http_response_code(200);
echo json_encode($response);
