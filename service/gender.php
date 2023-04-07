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
    
    $sex = array("Male","Female");
    $resultdata = array();
    $data = array();
    // include 'connectdatabase.php';
        $sql = "SELECT COUNT(*) FROM `passenger` RIGHT JOIN `reserve` ON `passenger`.`Passenger_ID` = `reserve`.`Passenger_ID` WHERE `sex` = '$sex[0]'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($resultdata,$row['COUNT(*)']);
                // echo $row['Parking_place_name'].":";
            }
        }
        // array_push($dropoff,$p);
        $sql = "SELECT COUNT(*) FROM `passenger` RIGHT JOIN `reserve` ON `passenger`.`Passenger_ID` = `reserve`.`Passenger_ID` WHERE `sex` = '$sex[1]'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($resultdata,$row['COUNT(*)']);
                // echo " ".$row['COUNT(drop_off_id)']."  ";
            }
        }
        // array_push($data,"['".$dropoff[$p-1]."'".", ".$resultdata[$p-1]."]");
    
    // $cparking = count($sex);

// $strMonthCut = array("", "", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "2022", "2023");
$response = [
    'status' => true,
    'response' => [
        'label' => 'เพศ',
        'labels' => $sex, 
        'results' => $resultdata
    ],
    'message' => 'OK'
];
http_response_code(200);
echo json_encode($response);