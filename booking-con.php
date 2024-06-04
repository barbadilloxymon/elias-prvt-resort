<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Database connection
    $conn = new mysqli('localhost', 'root', '', 'elias');

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Get form data
    $fname = $_POST["fname"];
    $phone = $_POST["phone"];
    $address = $_POST["address"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $checkindate = $_POST["checkindate"];
    $checkoutdate = $_POST["checkoutdate"];
    $citime = $_POST["citime"];
    $cotime = $_POST["cotime"];
    $adult = $_POST["adult"];
    $child = $_POST["child"];
    $rooms = $_POST["rooms"];

    // Prepared statement to prevent SQL injection
    $sql = "INSERT INTO register (fname, phone, address, gender, email, checkindate, checkoutdate, citime, cotime, adult, child, rooms, verified, status) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, 0, 'pending')";
    $stmt = $conn->prepare($sql);
    if ($stmt === false) {
        die("Prepare failed: " . $conn->error);
    }

    $stmt->bind_param("sssssssssssi", $fname, $phone, $address, $gender, $email, $checkindate, $checkoutdate, $citime, $cotime, $adult, $child, $rooms);

     // Execute the prepared statement
     if ($stmt->execute()) {
        echo "<script>alert('Thank you for your reservation! Your exclusive retreat at Elias Resort is almost ready. Our team will contact you shortly to confirm your details.'); window.location='index.php';</script>";
    } else {
        echo "Error: " . $stmt->error;
    }
    
    // Execute the prepared statement
    if (!$stmt->execute()) {
        die("Execute failed: " . $stmt->error);
    }

    
    // Close prepared statement and connection
    $stmt->close();
    $conn->close();
}
?>
