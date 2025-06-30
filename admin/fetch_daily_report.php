<?php
session_start();
require('../dbconn.php'); // Make sure path is correct

if (!isset($_SESSION['RollNo'])) {
    echo json_encode(['error' => 'Access denied']);
    exit();
}

$type = isset($_GET['type']) ? $_GET['type'] : 'borrow';
$month = isset($_GET['month']) ? $_GET['month'] : date('m');
$year = date('Y'); // you can also allow year selection if needed

$data = [];
$labels = [];
$daysInMonth = cal_days_in_month(CAL_GREGORIAN, $month, $year);

for ($day = 1; $day <= $daysInMonth; $day++) {
    $labels[] = $day;
    $date_start = "$year-$month-" . str_pad($day, 2, "0", STR_PAD_LEFT) . " 00:00:00";
    $date_end = "$year-$month-" . str_pad($day, 2, "0", STR_PAD_LEFT) . " 23:59:59";

    if ($type == 'borrow') {
        $sql = "SELECT COUNT(*) as total FROM record WHERE Date_of_Issue BETWEEN '$date_start' AND '$date_end'";
    } elseif ($type == 'register') {
        // You may need a registration date column here; 
        // for demo, we will just count all users (just to simulate data)
        $sql = "SELECT COUNT(*) as total FROM user WHERE RollNo REGEXP '.*'";
    }

    $result = $conn->query($sql);
    $row = $result->fetch_assoc();
    $data[] = (int)$row['total'];
}

echo json_encode([
    'labels' => $labels,
    'data' => $data
]);
?>
