<?php
session_start();
require '../DBcon/dbcon.php';

if (!isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
    header("Location: ../login.php");
    exit();
}

if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: ../login.php");
    exit();
}


// Check if "about" content exists, if not, insert default content
$query = "SELECT * FROM about LIMIT 1";
$result = mysqli_query($con, $query);

if (mysqli_num_rows($result) == 0) {
    $defaultDescription = 'Default description about Elias Private Resort.';
    $defaultImagePath = 'Images/default.jpg';
    $insertQuery = "INSERT INTO about (description, image_path) VALUES ('$defaultDescription', '$defaultImagePath')";
    mysqli_query($con, $insertQuery);
    $result = mysqli_query($con, $query); // Re-run the select query
}

$about = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>About Us Admin</title>
    <link rel="stylesheet" href="aboutus.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<div class="sidebar">
    <div class="logo">
        <ul class="menu">
            <li class="active"><a href="../Dashboard/dashb.php"><i class="fas fa-tachometer-alt"></i><span>Dashboard</span></a></li>
            <li><a href="../Registration/registration.php"><i class="fas fa-users"></i><span>Client</span></a></li>
            <li><a href="../Contact/contact.php"><i class="fas fa-address-book"></i><span>Contact</span></a></li>
            <li class="active"><a href="aboutus.php"><i class="fas fa-users-line"></i><span>About Us</span></a></li>
            <li class="active"><a href="../Room/room.php"><i class="fas fa-bed"></i><span>Room</span></a></li>
            <li class="active"><a href="../Gallery/gallery.php"><i class="fas fa-image"></i><span>Gallery</span></a></li>
        </ul>
    </div>
</div>

<div class="main--content">
    <div class="header--wrapper">
        <div class="header--title"><span>Primary</span><h2>About Us</h2></div>
        <div class="user--info">
            <!-- <div class="search--box"><i class="fa-solid fa-search"></i><input type="text" placeholder="Search here..." name="search"></div> -->
            <img src="../Login-form/img/avatar.svg" alt="" id="avatar-img">
        </div>
    </div>

    <div class="box-container">
        <div class="box">
        <img src="../AboutUs/AboutUs-Img/aboutus_img.jpg" alt="" id="aboutus-img">
            <div class="content">
                <h3 class="text">About Us Media</h3>
                <form method="POST" enctype="multipart/form-data">
                    <input type="file" name="about_media" accept="image/jpeg, image/jpg, image/png, image/gif, video/mp4" style="display: none;" id="aboutus-upload">
                    <button type="button" class="btn btn-primary mt-3" onclick="document.getElementById('aboutus-upload').click()">Change Photo</button>
            </div>
        </div>

        <div class="box">
            <div class="content">
                <h3 class="text">Description</h3>
                <textarea name="description" id="description" class="form-control" style="height: 300px;" readonly><?= htmlspecialchars($about['description']) ?></textarea>
                <button type="button" id="edit-button" class="btn btn-primary mt-3">Edit Description</button>
                <button type="submit" id="save-button" name="update_about" class="btn btn-primary mt-3" style="display: none;">Save Description</button>
                </form>
            </div>
        </div>
    </div>

    <div class="modal fade" id="logoutModal" tabindex="-1" aria-labelledby="logoutModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header"><h5 class="modal-title" id="logoutModalLabel">Logout Confirmation</h5><button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button></div>
                <div class="modal-body">Are you sure you want to logout?</div>
                <div class="modal-footer"><button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <form action="" method="POST"><input type="hidden" name="logout" value="true"><button type="submit" class="btn btn-danger">Logout</button></form>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="aboutus.js"></script>
<script>
document.addEventListener('DOMContentLoaded', function () {
    // Handle modal display
    const avatarImg = document.getElementById('avatar-img');
    const logoutModal = document.getElementById('logoutModal');

    avatarImg.addEventListener('click', function () {
        $('#logoutModal').modal('show');
    });

    // Handle description text editing
    const editButton = document.getElementById('edit-button');
    const saveButton = document.getElementById('save-button');
    const descriptionTextArea = document.getElementById('description');

    editButton.addEventListener('click', function () {
        const confirmEdit = confirm("Are you sure you want to edit the description?");
        if (confirmEdit) {
            descriptionTextArea.removeAttribute('readonly');
            saveButton.style.display = 'block';
            editButton.style.display = 'none';
        }
    });

    saveButton.addEventListener('click', function (event) {
        const confirmSave = confirm("Are you sure you want to save the changes?");
        if (!confirmSave) {
            event.preventDefault();
            return false;
        }
        descriptionTextArea.setAttribute('readonly', 'readonly');
        saveButton.style.display = 'none';
        editButton.style.display = 'block';
    });

    // JavaScript to handle photo upload
document.addEventListener('DOMContentLoaded', function () {
    const photoUploadInputs = document.querySelectorAll('input[type="file"]');
    
    photoUploadInputs.forEach(function (photoUploadInput) {
        photoUploadInput.addEventListener('change', function () {
            const file = this.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function (e) {
                    const imgElement = document.querySelector(`img[id="${photoUploadInput.id.replace('-upload', '-img')}"]`);
                    imgElement.src = e.target.result;
                };
                reader.readAsDataURL(file);
            }
        });
    });
});
</script>
</body>
</html>
