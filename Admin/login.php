<?php
session_start(); // Start a new session

// Include database connection
include './DBcon/dbcon.php';

// Check if the user is already logged in
if(isset($_SESSION["username"]) && isset($_SESSION["password"])){
    // Redirect to the dashboard if the user is logged in
    header("Location: Dashboard/dashb.php");
    exit();
}


// Define variables to store error message
$error = "";

// Handle login form submission
if (isset($_POST["Login"])) {
    $username = trim($_POST["username"]);
    $password = trim($_POST["password"]);

    if (!empty($username) && !empty($password)) {
        // Query to check if the user exists in the database
        $stmt = $con->prepare("SELECT * FROM admin WHERE username = ? AND password = ?");
        $stmt->bind_param("ss", $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // Valid user, set session and cookie variables
            $_SESSION["username"] = $username;
            $_SESSION["password"] = $password;
            setcookie("username", $username, time() + (86400 * 30), "/"); // 86400 = 1 day
            setcookie("password", $password, time() + (86400 * 30), "/"); // 86400 = 1 day
            header("Location: Dashboard/dashb.php");
            exit();
        } else {
            // Invalid username or password
            $error = "Invalid username or password.";
        }
    } else {
        $error = "Please fill in both fields.";
    }
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Animated Login Form</title>
    <link rel="stylesheet" type="text/css" href="Login-form/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
    <script src="https://kit.fontawesome.com/a81368914c.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
    <!-- <img class="wave" src="Login-form/img/wave.png"> -->
    <div class="container">
        <div class="img">
            <img src="Login-form/img/bg.svg">
        </div>
        <div class="login-content">
            <form method="POST">
                <img src="Login-form/img/avatar.svg">
                <h3 class="title">Welcome Admin</h3>
                <div class="input-div one">
                   <div class="i">
                        <i class="fas fa-user"></i>
                   </div>
                   <div class="div">
                        <h5>Username</h5>
                        <input type="text" class="input" name="username" required>
                   </div>
                </div>
                <div class="input-div pass">
                   <div class="i"> 
                        <i class="fas fa-lock"></i>
                   </div>
                   <div class="div">
                        <h5>Password</h5>
                        <input type="password" class="input" name="password" required>
                   </div>
                </div>
                <!-- <div class="remember-me">
                    <input type="checkbox" id="remember" name="remember" required>
                    <label for="remember">Remember Me</label>
                </div> -->
                <input type="submit" class="btn" name="Login" value="Login">
                <?php if($error): ?>
                    <p style="color: red;"><?php echo $error; ?></p>
                <?php endif; ?>
            </form>
        </div>
    </div>

    <script type="text/javascript" src="Login-form/js/main.js"></script>
</body>
</html>