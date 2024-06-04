<?php
if (isset($_POST['submit'])) {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["aboutImage"]["name"]);
    echo "Target File: " . $target_file . "<br>"; // Debugging output

    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

    // ... (rest of your code)

    // Check if directory exists
    if (!file_exists($target_dir)) {
        mkdir($target_dir, 0777, true);
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["aboutImage"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["aboutImage"]["name"])). " has been uploaded.";
            // Update the image path in your database here
            // For example, use a database connection and SQL update statement
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}
?>
