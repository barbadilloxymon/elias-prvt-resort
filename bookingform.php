
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reservation</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">
    <link rel="stylesheet" href="Css/booking.css">
</head>
<body>

<header class="header">
    <a href="index.php" class="logo"><i class="fas fa-house-flood-water"></i>Elias Resort</a>
</header>

<div class="container">
    <h1>RESERVATION RECEIPT</h1>
    <form action="booking-con.php" method="POST">
        <div class="form first">
            <div class="details personal">
                <span class="title">Personal Details</span>
                <div class="fields">
                    <div class="input-field">
                        <label for="fname">Full Name:</label>
                        <input type="text" id="fname" name="fname" placeholder="Enter full name" required>
                    </div>
                    <div class="input-field">
                        <label for="phone">Phone:</label>
                        <input type="tel" id="phone" name="phone" placeholder="Enter phone number" required>
                    </div>
                    <div class="input-address">
                        <label for="address">Address:</label>
                        <input type="text" id="address" placeholder="Enter your address" name="address" required>
                    </div>
                    <div class="input-gender">
                        <label for="gender">Gender:</label>
                        <select name="gender" id="gender" required>
                            <option value="" disabled selected>Select</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                            <option value="not_specified">Prefer not to say</option>
                        </select>
                    </div>
                    <div class="input-field">
                        <label for="email">Email:</label>
                        <input type="email" id="email" name="email" placeholder="Enter your e-mail" required>
                    </div>
                    <div class="input-field">
                        <label for="checkindate">Check-in Date:</label>
                        <input type="date" id="checkindate" name="checkindate" required>
                    </div>
                    <div class="input-field">
                        <label for="checkoutdate">Check-out Date:</label>
                        <input type="date" id="checkoutdate" name="checkoutdate" required>
                    </div>
                    <div class="input-field">
                        <label for="citime">Check in Time:</label>
                        <input type="time" name="citime" id="citime" required>
                    </div>
                    <div class="input-field">
                        <label for="cotime">Check out Time:</label>
                        <input type="time" name="cotime" id="cotime" required>
                    </div>
                    <div class="input-field">
                        <label for="adult">Number of Adults:</label>
                        <input type="number" name="adult" id="adult" class="input" min="1" max="40" placeholder="Enter No. of Adults">
                    </div>
                    <div class="input-field">
                        <label for="child">Number of Children:</label>
                        <input type="number" name="child" id="child" class="input" min="1" max="40" placeholder="Enter No. of Children">
                    </div>
                    <div class="input-rooms">
                        <label for="rooms">Number of Room:</label>
                        <select name="rooms" id="rooms" class="input">
                            <option value="1">1 room</option>
                            <option value="2">2 rooms</option>
                            <option value="3">3 rooms</option>
                            <option value="4">4 rooms</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
        <a href="index.php" class="back-btn"><i class="fas fa-arrow-left"></i> Back </a>
        <input type="submit" class="btn" value="Submit">
    </form>
</div>

</body>
</html>
