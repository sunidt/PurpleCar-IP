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
$timeT = array("0640","0700","0805","0825","0900","0925","1025","1035","1150","1220","1315","1335","1440","1500","1605","1625","1730");
// $strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
// while($i <= $year){
    
    $time = array("06:40","07:00","08:05","08:25","09:00","09:25","10:25","10:35","11:50","12:20","13:15","13:35","14:40","15:00","16:05","16:25","17:30");
    $resultdata = array();
    $data = array();
    // include 'connectdatabase.php';
    for ($p = 0; $p <= 16; $p++){
        $sql = "SELECT COUNT(*) FROM `ticket` RIGHT JOIN `reserve` ON `ticket`.`Ticket_ID` = `reserve`.`Ticket_ID` inner join `driving_cycle` ON `driving_cycle`.`driving_cycle_id` = `ticket`.Driving_cycle_ID WHERE `time_id` = $timeT[$p]";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($resultdata,$row['COUNT(*)']);
                // echo $row['Parking_place_name'].":";
            }
        }
        // array_push($dropoff,$p);
        // $sql = "SELECT COUNT(*) FROM `passenger` RIGHT JOIN `reserve` ON `passenger`.`Passenger_ID` = `reserve`.`Passenger_ID` WHERE `sex` = '$sex[1]'";
        // $result = mysqli_query($conn, $sql);
        // if (mysqli_num_rows($result) > 0){
        //     while($row = mysqli_fetch_assoc($result)){
        //         array_push($resultdata,$row['COUNT(*)']);
        //         // echo " ".$row['COUNT(drop_off_id)']."  ";
        //     }
        // }
    }
        // array_push($data,"['".$dropoff[$p-1]."'".", ".$resultdata[$p-1]."]");
    
    // $cparking = count($sex);

// $strMonthCut = array("", "", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "2022", "2023");
$response = [
    'status' => true,
    'response' => [
        'label' => 'เวลา',
        'labels' => $time, 
        'results' => $resultdata
    ],
    'message' => 'OK'
];
http_response_code(200);
echo json_encode($response);