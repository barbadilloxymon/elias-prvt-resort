<?php
session_start();
require '../DBcon/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["new-image"])) {
    $imageName = $_FILES["new-image"]["name"];
    $imageTmpName = $_FILES["new-image"]["tmp_name"];
    $imageSize = $_FILES["new-image"]["size"];
    $imageError = $_FILES["new-image"]["error"];
    $imageType = $_FILES["new-image"]["type"];

    $imageExt = strtolower(pathinfo($imageName, PATHINFO_EXTENSION));
    $allowed = array("jpg", "jpeg", "png", "gif");

    if (in_array($imageExt, $allowed)) {
        if ($imageError === 0) {
            if ($imageSize < 1000000) {  // size less than 1MB
                $newImageName = uniqid('', true) . "." . $imageExt;
                $imageDestination = "../Gallery/" . $newImageName;

                if (move_uploaded_file($imageTmpName, $imageDestination)) {
                    $query = "INSERT INTO gallery_images (image_path) VALUES ('$newImageName')";
                    if (mysqli_query($con, $query)) {
                        echo "Image uploaded successfully";
                    } else {
                        echo "Failed to save image information to database";
                    }
                } else {
                    echo "Failed to move uploaded file";
                }
            } else {
                echo "Image file size too large";
            }
        } else {
            echo "Error uploading image file";
        }
    } else {
        echo "Invalid file type";
    }
} else {
    echo "No file uploaded";
}
?>
