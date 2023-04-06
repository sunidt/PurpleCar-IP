<?php
// กำหนดข้อมูลการเชื่อมต่อฐานข้อมูล
include('connectdatabase.php');

// ตรวจสอบการเชื่อมต่อฐานข้อมูล
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// ดึงข้อมูลรูปภาพจากฐานข้อมูล
$sql = "SELECT receipt FROM reserve WHERE Ticket_ID = 13088";
$result = $conn->query($sql);

// ตรวจสอบการดึงข้อมูล
if ($result->num_rows > 0) {
    // แสดงรูปภาพ
    $row = $result->fetch_assoc();
    header('Content-type: image/png');
    echo base64_decode($row["receipt"]);
} else {
    echo "No image found";
}

// ปิดการเชื่อมต่อฐานข้อมูล
$conn->close();
?>
