<?php
session_start();
require '../DBcon/dbcon.php';

// Delete user functionality
if(isset($_POST['delete_user'])) {
    $contact_id = $_POST['delete_user'];
    
    // Using prepared statements to prevent SQL injection
    $stmt = $con->prepare("DELETE FROM contact WHERE contact_id = ?");
    $stmt->bind_param("i", $contact_id);
    if($stmt->execute()) {
        $_SESSION['success'] = "User deleted successfully";
    } else {
        $_SESSION['error'] = "Failed to delete user";
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
        $sort_query = " ORDER BY firstName ASC";
    } elseif($sort_option == "z-a") {
        $sort_query = " ORDER BY firstName DESC"; // Corrected column name
    }
}


// Initialize query
$query = "SELECT * FROM contact";

// Check if a search term is provided
if(isset($_GET['search']) && !empty($_GET['search'])) {
    $filtervalues = mysqli_real_escape_string($con, $_GET['search']);
    $query .= " WHERE CONCAT(firstName, lastName, email, phone, message) LIKE '%$filtervalues%'";
}

// Append sorting query if provided
$query .= $sort_query;

// Run query
$query_run = mysqli_query($con, $query);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Information</title>
    <link rel="stylesheet" href="contact.css">

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
            <a href="contact.php">
                <i class="fas fa-address-book"></i>
                <span>Contact</span>
            </a>
            </li>

            <!-- <li class="active">
                <a href="../Calendar/calendar.php">
                    <i class="fas fa-calendar-days"></i>
                    <span>Calendar</span>
                </a>
            </li> -->
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
            <h2>Contact-Info</h2>
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
                        <button type="submit" class="btn btn-danger" style="margin-left: 1rem; margin-top: 7px;  ">Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <div class="container mt-4">
        
        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h3>Manage Contact
                            <a href="add-user.php" class="btn btn-primary float-end">Add New</a>
                        </h3>
                    </div>

                    <div class="card-body">
                      <div class="table-responsive"> <!-- Add this div for responsiveness -->
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Firstname</th>
                                    <th>Lastname</th>
                                    <th>Email</th>
                                    <th>Phone No.</th>
                                    <th class="message-col">Message</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                            <?php 
                                while($contact = mysqli_fetch_assoc($query_run)) {
                                ?>
                                <tr>
                                    <td><?= $contact['contact_id']; ?></td>
                                    <td><?= $contact['firstName']; ?></td>
                                    <td><?= $contact['lastName']; ?></td>
                                    <td><?= $contact['email']; ?></td>
                                    <td><?= $contact['phone']; ?></td>
                                    <td><?= $contact['message']; ?></td>
                                    <td>
                                    <div class="action-buttons">
                                        <a href="reply.php?email=<?= urlencode($contact['email']); ?>" class="btn btn-success">Reply</a>
                                        <a href="edit-user.php?contact_id=<?= $contact['contact_id']; ?>" class="btn btn-primary">Edit</a>
                                         <form action="" method="POST" class="d-inline">
                                            <input type="hidden" name="delete_user" value="<?= $contact['contact_id']; ?>">
                                            <button type="submit" name="delete_user_submit" class="btn btn-danger">Delete</button>
                                        </form>
                                    </div>
                                    </td>
                                </tr>
                                <?php
                                    }
                                    if(mysqli_num_rows($query_run) == 0) {
                                        echo "<tr><td colspan='7'>No Record Found</td></tr>";
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
