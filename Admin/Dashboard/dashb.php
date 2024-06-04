<?php
session_start();
require '../DBcon/dbcon.php';

if (!isset($_SESSION["username"]) || !isset($_SESSION["password"])) {
    // Redirect to the login page
    header("Location: ../login.php");
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

// Fetch counts for total bookings, total clients, and failed bookings
$query_total_bookings = "SELECT COUNT(*) AS total_bookings FROM register";
$result_total_bookings = mysqli_query($con, $query_total_bookings);
$total_bookings = mysqli_fetch_assoc($result_total_bookings)["total_bookings"];

$query_total_clients = "SELECT COUNT(*) AS total_clients FROM register WHERE status = 'Verified'";
$result_total_clients = mysqli_query($con, $query_total_clients);
$total_clients = mysqli_fetch_assoc($result_total_clients)["total_clients"];

$query_failed_bookings = "SELECT COUNT(*) AS failed_bookings FROM register WHERE status = 'Not Verified'";
$result_failed_bookings = mysqli_query($con, $query_failed_bookings);
$failed_bookings = mysqli_fetch_assoc($result_failed_bookings)["failed_bookings"];

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

// Initialize query
$query = "SELECT * FROM register";

// Check if a search term is provided
if(isset($_GET['search']) && !empty($_GET['search'])) {
    $filtervalues = mysqli_real_escape_string($con, $_GET['search']);
    $query .= " WHERE CONCAT(fname, email) LIKE '%$filtervalues%'";
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
    <title>Admin Page</title>
    <link rel="stylesheet" href="dashb.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <!-- Bootstrap -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="sidebar">
        <ul class="menu">
            <li class="active">
                <a href="dashb.php">
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

    <!-- Content -->
    <div class="main--content">
        <div class="header--wrapper">
            <div class="header--title">
                <span>Primary</span>
                <h2>Dashboard</h2>
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
         
          <!-- Status Content -->
          <div class="status--container mt-4">

          <h4 class="main--title">Today's Data</h4>

          <div class="row">
            
              <div class="col-md-4 mb-4">
                  <div class="totalstatus--box">
                      <div class="totalstatus--header">
                          <div class="status">
                              <span class="title">Total Bookings</span>
                              <span class="booking--value"><?php echo $total_bookings; ?></span>
                          </div>
                          <div>
                              <i class="fas fa-calendar-days icon"></i>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 mb-4">
                  <div class="totalstatus--box">
                      <div class="totalstatus--header">
                          <div class="status">
                              <span class="title">Total Clients</span>
                              <span class="booking--value"><?php echo $total_clients; ?></span>
                          </div>
                          <div>
                              <i class="fas fa-user icon"></i>
                          </div>
                      </div>
                  </div>
              </div>
              <div class="col-md-4 mb-4">
                  <div class="totalstatus--box">
                      <div class="totalstatus--header">
                          <div class="status">
                              <span class="title">Failed Booking</span>
                              <span class="booking--value"><?php echo $failed_bookings; ?></span>
                          </div>
                          <div>
                              <i class="fas fa-xmark icon"></i>
                          </div>
                      </div>
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
                            <h3>Client Verification</h3>
                        </div>

                        <div class="card-body">
                          <div class="table-responsive">
                            <table class="table table-bordered table-striped">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Full Name</th>
                                        <th>Email</th>
                                        <!-- <th>Status</th> -->
                                        <th style="width: 200px;">Action</th>
                                    </tr>
                                </thead>
                                <tbody id="user-table-body">
                                <?php
                // Check if any records were found
                if(mysqli_num_rows($query_run) > 0) {
                    foreach($query_run as $items) {
                ?>
                <tr>
                    <td><?= htmlspecialchars($items['register_id']); ?></td>
                    <td><?= htmlspecialchars($items['fname']); ?></td>
                    <td><?= htmlspecialchars($items['email']); ?></td>
                    <td>
                        <div class="btn-group" role="group" aria-label="User Verification">
                            <form action="code.php" method="POST" class="d-inline">
                                <input type="hidden" name="verify_user" value="<?= htmlspecialchars($items['register_id']); ?>">
                                <button type="submit" class="btn btn-success">Verify</button>
                            </form>
                            <form action="code.php" method="POST" class="d-inline">
                                <input type="hidden" name="not_verify_user" value="<?= htmlspecialchars($items['register_id']); ?>">
                                <button type="submit" class="btn btn-danger" style="margin-left: 8px; display: inline-block;">Not Verify</button>
                            </form>
                        </div>
                    </td>
                </tr>
                <?php
                    }
                } else {
                ?>
                <tr>
                    <td colspan="4">No Record Found</td>
                </tr>
                <?php
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

    
    <!-- Logout Modal -->
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
                        <button type="submit" class="btn btn-danger" style="margin-left: 2rem; margin-top: 2px;" >Logout</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    

    <!-- Js -->
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
