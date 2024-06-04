<?php
session_start();
require '../DBcon/dbcon.php';

if (!isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
    // Redirect to the login page
     header("Location: ../login.php"); // Change "login.php" to your actual login page
    exit();
}

// Check if logout button is clicked
if (isset($_POST["logout"])) {
    // Unset all session variables
    session_unset();

    // Destroy the session
    session_destroy();


    // Redirect to the login page
     header("Location: ../login.php");
    exit();
}


// Function to handle image upload
function uploadImage($galleryNumber) {
    $target_dir = "../Gallery/Images/";
    $target_file = $target_dir . basename($_FILES["photo{$galleryNumber}-upload"]["name"]);
    $uploadOk = 1;
    $imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

    // Check if image file is a actual image or fake image
    if(isset($_POST["submit"])) {
        $check = getimagesize($_FILES["photo{$galleryNumber}-upload"]["tmp_name"]);
        if($check !== false) {
            $uploadOk = 1;
        } else {
            echo "File is not an image.";
            $uploadOk = 0;
        }
    }

    // Check if file already exists
    if (file_exists($target_file)) {
        echo "Sorry, file already exists.";
        $uploadOk = 0;
    }

    // Check file size
    if ($_FILES["photo{$galleryNumber}-upload"]["size"] > 500000) {
        echo "Sorry, your file is too large.";
        $uploadOk = 0;
    }

    // Allow certain file formats
    if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
    && $imageFileType != "gif" ) {
        echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
        $uploadOk = 0;
    }

    // Check if $uploadOk is set to 0 by an error
    if ($uploadOk == 0) {
        echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
    } else {
        if (move_uploaded_file($_FILES["photo{$galleryNumber}-upload"]["tmp_name"], $target_file)) {
            echo "The file ". htmlspecialchars( basename( $_FILES["photo{$galleryNumber}-upload"]["name"])). " has been uploaded.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
}

// Check if a file has been uploaded
for ($i = 1; $i <= 8; $i++) {
    if(isset($_FILES["photo{$i}-upload"])) {
        uploadImage($i);
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
    <link rel="stylesheet" href="gallery.css">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

</head>
<body>
    
<div class="sidebar">
    <div class="logo">
        <ul class="menu">
            <li class="active">
                <a href="../Dashboard/dashb.php">
                    <i class="fas fa-tachometer-alt"></i>
                    <span>Dashboard</span>
                </a>
            </li>

            <li>
            <a href="../Registration/registration.php">
                <i class="fas fa-users"></i>
                <span>Client</span>
            </a>
            </li>

            <li>
            <a href="../Contact/contact.php">
                <i class="fas fa-address-book"></i>
                <span>Contact</span>
            </a>
            </li>

            <li class="active">
                <a href="../AboutUs/aboutus.php">
                    <i class="fas fa-users-line"></i>
                    <span>About Us</span>
                </a>
            </li>
            <li class="active">
                <a href="../Room/room.php">
                    <i class="fas fa-bed"></i>
                    <span>Room</span>
                </a>
            </li>
            <li class="active">
                <a href="gallery.php">
                    <i class="fas fa-image"></i>
                    <span>Gallery</span>
                </a>
            </li>
            
        </ul>
    </div>
</div>

<!-- Content -->

<div class="main--content">
    <div class="header--wrapper">
        <div class="header--title">
            <span>Primary</span>
            <h2>Gallery</h2>
        </div>
        <div class="user--info">
            <img src="../Login-form/img/avatar.svg" alt="" id="avatar-img" >
        </div>
    </div>

    <!-- Gallery Content -->
    <div class="box-container">
    <div class="box-container">
        <?php for ($i = 1; $i <= 8; $i++) { ?>
        <div class="box">
            <img src="../Gallery/Images/gallery<?php echo $i; ?>.jpeg" alt="" id="gallery<?php echo $i; ?>-img">
            <div class="content">
                <h3 class="text">Gallery <?php echo $i; ?></h3>
                <form id="profile-form-<?php echo $i; ?>" enctype="multipart/form-data" method="POST">
                    <label for="photo<?php echo $i; ?>-upload"></label>
                    <input type="file" name="photo<?php echo $i; ?>-upload" accept="image/*" style="display: none;">
                    <button type="button" class="btn btn-primary mt-3" onclick="document.getElementById('photo<?php echo $i; ?>-upload').click()">Change Photo</button>
                </form>
            </div>
        </div>
        <?php } ?>
    </div>


     <!-- Modal -->
     <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Are you sure you want to logout?
                </div>
                <div class="modal-footer ">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="" method="POST" id="logout-form">
                        <input type="hidden" name="logout" value="true">
                        <button type="submit" class="btn btn-danger" style="margin-left: 2rem; margin-top: 2px;  ">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>




<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script src="gallery.js"></script>
</body>
</html>



