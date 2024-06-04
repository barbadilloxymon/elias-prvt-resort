<?php
require '../DBcon/dbcon.php';

$query = "SELECT * FROM notifications WHERE status = 'unread' ORDER BY id DESC LIMIT 1";
$result = mysqli_query($con, $query);
$notification = mysqli_fetch_assoc($result);

header('Content-Type: application/json');
echo json_encode($notification);
?>
