<?php
session_start();
require '../DBcon/dbcon.php';

if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["delete-id"])) {
    $id = $_POST["delete-id"];

    $query = "SELECT image_path FROM gallery_images WHERE id = $id";
    $result = mysqli_query($con, $query);
    $row = mysqli_fetch_assoc($result);
    $imagePath = "../Gallery/" . $row["image_path"];

    if (unlink($imagePath)) {
        $deleteQuery = "DELETE FROM gallery_images WHERE id = $id";
        if (mysqli_query($con, $deleteQuery)) {
            echo "Image deleted successfully";
        } else {
            echo "Failed to delete image from database";
        }
    } else {
        echo "Failed to delete image file";
    }
} else {
    echo "No image ID provided";
}
?>
