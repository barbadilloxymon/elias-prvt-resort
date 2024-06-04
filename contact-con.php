<?php 
$firstName = htmlspecialchars($_POST['firstName']);
$lastName = htmlspecialchars($_POST['lastName']);
$email = htmlspecialchars($_POST['email']);
$phone = htmlspecialchars($_POST['phone']);
$message = htmlspecialchars($_POST['message']);

// Database connection
$conn = new mysqli('localhost', 'root', '', 'elias');

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);  
}

// Using prepared statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO contact (firstName, lastName, email, phone, message) VALUES (?, ?, ?, ?, ?)");
$stmt->bind_param("sssss", $firstName, $lastName, $email, $phone, $message);

if ($stmt->execute()) {

    echo "<script>alert('Message successfully submitted!'); window.location='index.php';</script>";

} else {
    echo "Error: " . $stmt->error;
}

// Close statement
$stmt->close();

// Close connection
$conn->close();
?>
