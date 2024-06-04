<?php
session_start();
require '../DBcon/dbcon.php';

// Delete user functionality
if(isset($_POST['delete_user'])) {
    $register_id = $_POST['delete_user'];
    
    // Using prepared statements to prevent SQL injection
    $stmt = $con->prepare("DELETE FROM register WHERE register_id = ?");
    $stmt->bind_param("i", $register_id);
    if($stmt->execute()) {
        $_SESSION['success'] = "Client deleted successfully";
    } else {
        $_SESSION['error'] = "Failed to delete client";
    }
    $stmt->close();
}

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



// Check if sorting option is provided
$sort_query = "";
if(isset($_GET['sort_alphabet']) && !empty($_GET['sort_alphabet'])) {
    $sort_option = $_GET['sort_alphabet'];
    if($sort_option == "a-z") {
        $sort_query = " ORDER BY fname ASC";
    } elseif($sort_option == "z-a") {
        $sort_query = " ORDER BY fname DESC";
    }
}

// Initialize query with prepared statement
$query = "SELECT * FROM register";
$filtervalues = "";
if(isset($_GET['search']) && !empty($_GET['search'])) {
    $filtervalues = "%{$_GET['search']}%";
    $query .= " WHERE CONCAT(fname, phone, address, gender, email, checkindate, checkoutdate, citime, cotime, adult, child, rooms) LIKE ?";
}

// Append sorting query if provided
$query .= $sort_query;

// Run query
$stmt = $con->prepare($query);
if(isset($_GET['search']) && !empty($_GET['search'])) {
    $stmt->bind_param("s", $filtervalues);
}
$stmt->execute();
$result = $stmt->get_result();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration Information</title>
    <link rel="stylesheet" href="registration.css">

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
                <a href="registration.php">
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
                <a href="../Gallery/gallery.php">
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
            <h2>Registration-Info</h2>
        </div>

        <form action="" method="GET">
                <div class="input-group mb-3">
                    <select name="sort_alphabet" id="" class="form-control">
                        <option value="">---Select Option---</option>
                        <option value="a-z" <?php if(isset($_GET['sort_alphabet'])  && $_GET['sort_alphabet'] == "a-z"){echo "selected"; } ?> > A-Z (Ascending Order)</option>
                        <option value="z-a" <?php if(isset($_GET['sort_alphabet'])  && $_GET['sort_alphabet'] == "z-a"){echo "selected"; } ?> > Z-A (Descending Order)</option>
                    </select>
                    <button type="submit" class="input-group-text btn btn-primary" id="basic-addon2">Sort</button>
                </div>
            </form>
            <div class="user--info">
                <form action="" method="GET">
                    <div class="input-group mb-3">
                          <input type="text" name="search" value="<?php if(isset($_GET['search'])) {echo $_GET['search']; }?>" class="form-control" placeholder="Search here...">
                          <button type="submit" class="btn btn-primary">Search</button>
                    </div>
                </form>
                <img src="../Login-form/img/avatar.svg" alt="" id="avatar-img">
            </div>
    </div>

    <div class="container mt-4">
        <?php include('message.php'); ?>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Client Details
                            <a href="add-user.php" class="btn btn-primary float-end">Add New</a>
                        </h3>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive"> <!-- Add this div for responsiveness -->
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Phone No.</th>
                                        <th>Address</th>
                                        <th>Gender</th>
                                        <th>Email</th>
                                        <th>Checkin-Date</th>
                                        <th>Checkout-Date</th>
                                        <th>Checkin-Time</th>
                                        <th>Chechout-Time</th>
                                        <th>Adult</th>
                                        <th>Child</th>
                                        <th>Room</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                <?php 
                                    if($result->num_rows > 0) {
                                        while($register = $result->fetch_assoc()) {
                                            $timeIn = date("h:i A", strtotime($register['citime']));
                                            $timeOut = date("h:i A", strtotime($register['cotime']));
                                    ?>
                                        <tr>
                                            <td><?= $register['register_id']; ?></td>
                                            <td><?= $register['fname']; ?></td>
                                            <td><?= $register['phone']; ?></td>
                                            <td><?= $register['address']; ?></td>
                                            <td><?= $register['gender']; ?></td>
                                            <td><?= $register['email']; ?></td>
                                            <td><?= $register['checkindate']; ?></td>
                                            <td><?= $register['checkoutdate']; ?></td>
                                            <td><?= $timeIn; ?></td>
                                            <td><?= $timeOut; ?></td>
                                            <td><?= $register['adult']; ?></td>
                                            <td><?= $register['child']; ?></td>
                                            <td><?= $register['rooms']; ?></td>
            
                                            <td>
                                                <a href="register-view.php?register_id=<?= $register['register_id']; ?>" style="margin-bottom: .5rem;" class="btn btn-info"  >View</a>
                                                <a href="edit-user.php?register_id=<?= $register['register_id']; ?>" style="margin-bottom: .5rem;" class="btn btn-primary">Edit</a>
                                                <form action="" method="POST" class="d-inline">
                                                    <input type="hidden" name="delete_user" value="<?= $register['register_id']; ?>">
                                                    <button type="submit" name="delete_user_submit" class="btn btn-danger">Delete</button>
                                                </form>
                                            </td>
                                        </tr>
                                    <?php
                                        }
                                    } else {
                                        echo "<tr><td colspan='14'>No Record Found</td></tr>";
                                    }
                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
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
                        <button type="submit" class="btn btn-danger" style="margin-left: 2rem; margin-top: 2px;  ">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

<!-- Bootstrap JS -->
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>

<script>
    // JavaScript to handle modal display
    $(document).ready(function(){
        $("#avatar-img").click(function(){
            $('#logoutModal').modal('show');
        });
    });
</script>
</body>
</html>
