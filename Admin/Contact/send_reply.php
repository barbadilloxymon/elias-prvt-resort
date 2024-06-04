<?php
require '../DBcon/dbcon.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $message = $_POST['message'];
    $send_to = $_POST['send_to'];

    // Send email logic here (omitted for brevity)

    // Insert notification into the database
    $query = "INSERT INTO notifications (email, message, status) VALUES ('$email', '$message', 'unread')";
    mysqli_query($con, $query);

    // Redirect or show success message
    header('Location: reply.php?status=success');
}
?>
