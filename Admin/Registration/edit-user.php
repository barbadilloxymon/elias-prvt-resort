<?php
session_start();
require '../DBcon/dbcon.php';

?>

<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>Client Details</title>
</head>
<body>
<div class="container mt-5">
    <?php include('message.php'); ?>
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Edit Client Details 
                        <a href="registration.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">
                    <?php 
                    if(isset($_GET['register_id']))
                    {
                        $client_id = mysqli_real_escape_string($con, $_GET['register_id']);
                        $query = "SELECT * FROM register WHERE register_id='$client_id'";
                        $query_run = mysqli_query($con, $query);

                        if(mysqli_num_rows($query_run) > 0)
                        {
                            $register = mysqli_fetch_assoc($query_run);
                            ?>
                            <form action="code.php" method="POST">
                                <input type="hidden" name="client_id" value="<?= $register['register_id']; ?>">
                                <div class="mb-3">
                                <label>Full Name</label>
                                    <input type="text" name="fname" value="<?= $register['fname']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Phone</label>
                                    <input type="tel" name="phone" value="<?= $register['phone']; ?>" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label>Address:</label>
                                    <input type="text" name="address" value="<?= $register['address']; ?>" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="gender">Gender:</label>
                                    <select name="gender" id="gender" class="form-control" required>
                                        <option value="" disabled>Select</option>
                                        <option value="male" <?php if ($register['gender'] == 'male') echo 'selected'; ?>>Male</option>
                                        <option value="female" <?php if ($register['gender'] == 'female') echo 'selected'; ?>>Female</option>
                                        <option value="not_specified" <?php if ($register['gender'] == 'not_specified') echo 'selected'; ?>>Prefer not to say</option>
                                    </select>
                                </div>
                            
                                <div class="mb-3">
                                    <label>Email:</label>
                                    <input type="email" name="email" value="<?= $register['email']; ?>" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label>Check-in-date:</label>
                                    <input type="date" name="checkindate" value="<?= $register['checkindate']; ?>" class="form-control">
                                </div>

                            <div class="mb-3">
                                <label>Check-out-date:</label>
                                <input type="date" name="checkoutdate" value="<?= $register['checkoutdate']; ?>" class="form-control">
                            </div>
                            
                            <div class="mb-3">
                                <label>Check-in-time:</label>
                                <input type="time" name="citime" value="<?= $register['citime']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Check-out-time:</label>
                                <input type="time" name="cotime" value="<?= $register['cotime']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Number of Adults:</label>
                                <input type="number" name="adult" min="1" max="40"  value="<?= $register['adult']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Number of Children:</label>
                                <input type="number" name="child" min="1" max="40" value="<?= $register['child']; ?>" class="form-control">
                            </div>

                            <div class="mb-3">
                             <label for="rooms">Number of Room:</label>
                             <select name="rooms" id="rooms" class="form-control" required>
                                <option value="" disabled selected>Select</option>
                                <option value="1" <?php if ($register['rooms'] == '1') echo 'selected'; ?>>1 room</option>
                                <option value="2" <?php if ($register['rooms'] == '2') echo 'selected'; ?>>2 rooms</option>
                                <option value="3" <?php if ($register['rooms'] == '3') echo 'selected'; ?>>3 rooms</option>
                                <option value="4" <?php if ($register['rooms'] == '4') echo 'selected'; ?>>4 rooms</option>
                            </select>
                            </div>

                            <div class="mb-3">
                                <button type="submit" name="update_user" class="btn btn-primary">Update</button>
                            </div>
                            </form>
                            <?php
                        }
                        else
                        {
                            echo "<h4>No Such User ID Found</h4>";
                        }
                    }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
