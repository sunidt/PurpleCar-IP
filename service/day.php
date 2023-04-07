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
$today = date("Y-m-d");
// echo $today;
// $startdate = '2022-01-01';
$startdate = date("Y-m");
$endate = $today;
$labels = array();
$resultdata = array();
$currentdate = $startdate;

while($currentdate <= $endate){
    array_push($labels, $currentdate);
    $sql = "SELECT COUNT(bookDate) FROM `reserve` WHERE bookDate = '$currentdate'";
    $result = mysqli_query($conn, $sql);
    if (mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            array_push($resultdata,$row['COUNT(bookDate)']);
        }
    } else {
        array_push($resultdata, 0);
    }
    $currentdate = date('Y-m-d', strtotime($currentdate . ' +1 day'));
}

$response = [
    'status' => true,
    'response' => [
        'label' => 'ยอดขายรายวันของเดือนนี้',
        'labels' => $labels, 
        'results' => $resultdata
    ],
    'message' => 'OK'
];
http_response_code(200);
echo json_encode($response);
