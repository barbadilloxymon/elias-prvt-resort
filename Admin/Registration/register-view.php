<?php
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

    <title>Client View</title>
</head>
<body>

<div class="container mt-5">

    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">
                    <h4>Client View Details 
                        <a href="./registration.php" class="btn btn-danger float-end">BACK</a>
                    </h4>
                </div>
                <div class="card-body">

                    <?php
                    if (isset($_GET['register_id'])) {
                        $client_id = mysqli_real_escape_string($con, $_GET['register_id']);
                        $query = "SELECT * FROM register WHERE register_id='$client_id'";
                        $query_run = mysqli_query($con, $query);

                        if (mysqli_num_rows($query_run) > 0) {
                            $register = mysqli_fetch_array($query_run);
                            ?>
                            
                            <div class="mb-3">
                                <label>Client Name</label>
                                <p class="form-control">
                                    <?= htmlspecialchars($register['fname']); ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Phone</label>
                                <p class="form-control">
                                    <?= htmlspecialchars($register['phone']); ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Address</label>
                                <p class="form-control">
                                    <?= htmlspecialchars($register['address']); ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Gender</label>
                                <p class="form-control">
                                    <?= htmlspecialchars($register['gender']); ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Client Email</label>
                                <p class="form-control">
                                    <?= htmlspecialchars($register['email']); ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Check-in Date</label>
                                <p class="form-control">
                                    <?= htmlspecialchars($register['checkindate']); ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Check-out Date</label>
                                <p class="form-control">
                                    <?= htmlspecialchars($register['checkoutdate']); ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Check-in Time</label>
                                <p class="form-control">
                                    <?= htmlspecialchars($register['citime']); ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Check-out Time</label>
                                <p class="form-control">
                                    <?= htmlspecialchars($register['cotime']); ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Number Of Adults</label>
                                <p class="form-control">
                                    <?= htmlspecialchars($register['adult']); ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Number Of Children</label>
                                <p class="form-control">
                                    <?= htmlspecialchars($register['child']); ?>
                                </p>
                            </div>
                            <div class="mb-3">
                                <label>Number Of Rooms</label>
                                <p class="form-control">
                                    <?= htmlspecialchars($register['rooms']); ?>
                                </p>
                            </div>

                            <?php
                        } else {
                            echo "<h4>No Such Id Found</h4>";
                        }
                    } else {
                        echo "<h4>No register_id parameter provided in URL</h4>";
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
