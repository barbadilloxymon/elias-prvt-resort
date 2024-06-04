<?php
session_start();
?>

<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <title>User Create</title>
</head>
<body>
  
    <div class="container mt-5">

        <?php include('message.php'); ?>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Add New Client
                            <a href="registration.php" class="btn btn-danger float-end">BACK</a>
                        </h4>
                    </div>
                    <div class="card-body">
                        <form action="code.php" method="POST">

                            <div class="mb-3">
                                <label>Full Name:</label>
                                <input type="text" name="fname" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Phone:</label>
                                <input type="tel" name="phone" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Address:</label>
                                <input type="text" name="address" class="form-control">
                            </div>

                            <div class="mb-3">
                            <label for="gender">Gender:</label>
                            <select name="gender" id="gender" class="form-control" required>
                                <option value="" disabled selected>Select</option>
                                <option value="male">Male</option>
                                <option value="female">Female</option>
                                <option value="not_specified">Prefer not to say</option>
                            </select>
                            </div>
                            
                            <div class="mb-3">
                                <label>Email:</label>
                                <input type="email" name="email" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Check-in-date:</label>
                                <input type="date" name="checkindate" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Check-out-date:</label>
                                <input type="date" name="checkoutdate" class="form-control">
                            </div>
                            
                            <div class="mb-3">
                                <label>Check-in-time:</label>
                                <input type="time" name="citime" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Check-out-time:</label>
                                <input type="time" name="cotime" class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Number of Adults:</label>
                                <input type="number" name="adult" min="1" max="40"  class="form-control">
                            </div>

                            <div class="mb-3">
                                <label>Number of Children:</label>
                                <input type="number" name="child" min="1" max="40" class="form-control">
                            </div>

                            <div class="mb-3">
                             <label for="rooms">Number of Room:</label>
                             <select name="rooms" id="rooms" class="form-control">
                             <option value="1">1 room</option>
                             <option value="2">2 rooms</option>
                             <option value="3">3 rooms</option>
                             <option value="4">4 rooms</option>
                             </select>
                            </div>
                            
                            <div class="mb-3">
                                <button type="submit" name="submit" class="btn btn-primary">Submit</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>