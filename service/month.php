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
$strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
// while($i <= $year){
    
for ($m = 1; $m <= 12; $m++){
    array_push($labels,$strMonthCut[$m]);
    // echo $stry;
    if($m < 10){
        $strm = (string)$year.'-'.'0'.(string)$m.'%';
        // echo $strm;
        $sql = "SELECT COUNT(bookDate) FROM `reserve` WHERE bookDate LIKE '$strm'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($resultdata,$row['COUNT(bookDate)']);
            }
        }
    }else{
        $strm = (string)$year.'-'.(string)$m.'%';
        // echo $strm;
        $sql = "SELECT COUNT(bookDate) FROM `reserve` WHERE bookDate LIKE '$strm'";
        $result = mysqli_query($conn, $sql);
        if (mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_assoc($result)){
                array_push($resultdata,$row['COUNT(bookDate)']);
            }
        }
    }
//     $i = $i+1;
}

// $strMonthCut = array("", "", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "2022", "2023");
$response = [
    'status' => true,
    'response' => [
        'label' => 'ยอดขายรายเดือน',
        'labels' => $labels, 
        'results' => $resultdata
    ],
    'message' => 'OK'
];
http_response_code(200);
echo json_encode($response);