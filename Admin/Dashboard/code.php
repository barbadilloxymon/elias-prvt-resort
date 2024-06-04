<?php
session_start();
require '../DBcon/dbcon.php';

// Verify user functionality
if (isset($_POST['verify_user'])) {
    $register_id = $_POST['verify_user'];
    $stmt = $con->prepare("UPDATE register SET status = 'Verified' WHERE register_id = ?");
    $stmt->bind_param("i", $register_id);
    if ($stmt->execute()) {
        $_SESSION['success'];
    } else {
        $_SESSION['error'];
    }
    $stmt->close();
}

// Not verify user functionality
if (isset($_POST['not_verify_user'])) {
    $register_id = $_POST['not_verify_user'];
    $stmt = $con->prepare("UPDATE register SET status = 'Not Verified' WHERE register_id = ?");
    $stmt->bind_param("i", $register_id);
    if ($stmt->execute()) {
        $_SESSION['success'];
    } else {
        $_SESSION['error'];
    }
    $stmt->close();
}

// Redirect back to the dashboard
header("Location: ../Dashboard/dashb.php");
exit();
?>
