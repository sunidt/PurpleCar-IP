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

$strMonthCut = array("", "มกราคม", "กุมภาพันธ์", "มีนาคม", "เมษายน", "พฤษภาคม", "มิถุนายน", "กรกฎาคม", "สิงหาคม", "กันยายน", "ตุลาคม", "พฤศจิกายน", "ธันวาคม");
$response = [
    'status' => true,
    'response' => [
        'label' => 'ยอดขายเดือน '.$strMonthCut[date("m")].' '.date("Y"),
        'labels' => ['#1', '#2', '#3', '#4', '#5', '#6', '#7'], 
        'results' => [1290, 2000, 1300, 1800, 1000, 1500, 2600]
    ],
    'message' => 'OK'
];
http_response_code(200);
echo json_encode($response);