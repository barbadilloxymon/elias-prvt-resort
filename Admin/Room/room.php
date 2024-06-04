<?php
session_start();
require '../DBcon/dbcon.php';

if (!isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
    // Redirect to the login page
    header("Location: ../login.php");
    exit();
}

if (isset($_POST["logout"])) {
    session_unset();
    session_destroy();
    header("Location: ../login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
    <link rel="stylesheet" href="room.css">
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
            <li class="active"><a href="../Calendar/calendar.php"><i class="fas fa-calendar-days"></i><span>Calendar</span></a></li>
            <li class="active"><a href="../AboutUs/aboutus.php"><i class="fas fa-users-line"></i><span>About Us</span></a></li>
            <li class="active"><a href="room.php"><i class="fas fa-bed"></i><span>Room</span></a></li>
            <li class="active"><a href="../Gallery/gallery.php"><i class="fas fa-image"></i><span>Gallery</span></a></li>
        </ul>
    </div>
</div>

<div class="main--content">
    <div class="header--wrapper">
        <div class="header--title">
            <span>Primary</span>
            <h2>Room</h2>
        </div>
        <div class="user--info">
            <div class="search--box">
                <i class="fa-solid fa-search"></i>
                <input type="text" placeholder="Search here..." name="search">
            </div>
            <img src="../Login-form/img/avatar.svg" alt="" id="avatar-img">
        </div>
    </div>

    <!-- Room IMG Content -->
    <div class="box-container">
    <div class="box">
        <img src="../Room/Room-Img/room1.bg.jpg" alt="" id="room1-img">
        <div class="content">
            <h3 class="text">Room 1 Image</h3>
            <form>
                <input type="file" id="room1-upload" accept="image/*" style="display: none;">
                <button type="button" class="btn btn-primary mt-3" onclick="document.getElementById('room1-upload').click()">Change Photo</button>
            </form>
            <h3 class="description">Description</h3>
            <p id="room-description-1">One double deck bed</p>
            <button type="button" class="btn btn-primary mt-3" onclick="editDescription(1)">Edit Description</button>
        </div>
    </div>

    <div class="box">
        <img src="../Room/Room-Img/room2.bg.jpg" alt="" id="room2-img">
        <div class="content">
            <h3 class="text">Room 2 Image</h3>
            <form>
                <input type="file" id="room2-upload" accept="image/*" style="display: none;">
                <button type="button" class="btn btn-primary mt-3" onclick="document.getElementById('room2-upload').click()">Change Photo</button>
            </form>
            <h3 class="description">Description</h3>
            <p id="room-description-2">One double deck bed</p>
            <button type="button" class="btn btn-primary mt-3" onclick="editDescription(2)">Edit Description</button>
        </div>
    </div>

    <div class="box">
        <img src="../Room/Room-Img/room3.jpg" alt="" id="room3-img">
        <div class="content">
            <h3 class="text">Room 3 Image</h3>
            <form>
                <input type="file" id="room3-upload" accept="image/*" style="display: none;">
                <button type="button" class="btn btn-primary mt-3" onclick="document.getElementById('room3-upload').click()">Change Photo</button>
            </form>
            <h3 class="description">Description</h3>
            <p id="room-description-3">Three double deck bed</p>
            <button type="button" class="btn btn-primary mt-3" onclick="editDescription(3)">Edit Description</button>
        </div>
    </div>

    <div class="box">
        <img src="../Room/Room-Img/room4.bg.jpg" alt="" id="room4-img">
        <div class="content">
            <h3 class="text">Room 4 Image</h3>
            <form>
                <input type="file" id="room4-upload" accept="image/*" style="display: none;">
                <button type="button" class="btn btn-primary mt-3" onclick="document.getElementById('room4-upload').click()">Change Photo</button>
            </form>
            <h3 class="description">Description</h3>
            <p id="room-description-4">Four double deck bed</p>
            <button type="button" class="btn btn-primary mt-3" onclick="editDescription(4)">Edit Description</button>
        </div>
    </div>
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
                        <button type="submit" class="btn btn-danger" style="margin-left: 2rem; margin-top: 2px;">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="js/room.js"></script>
</body>
</html>
