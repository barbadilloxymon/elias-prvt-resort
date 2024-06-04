<?php
session_start();
require '../DBcon/dbcon.php';

if(isset($_POST['delete_user']))
{
    $register_id = mysqli_real_escape_string($con, $_POST['delete_user']);

    $query = "DELETE FROM register WHERE register_id='$register_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)   
    {
        $_SESSION['message'] = "Client Deleted Successfully";
        header("Location: registration.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Client Not Deleted";
        header("Location: registration.php");
        exit(0);    
    }
}


if(isset($_POST['update_user']))
{
    $client_id = mysqli_real_escape_string($con, $_POST['client_id']);

    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $checkindate = mysqli_real_escape_string($con, $_POST['checkindate']);
    $checkoutdate = mysqli_real_escape_string($con, $_POST['checkoutdate']);
    $citime = mysqli_real_escape_string($con, $_POST['citime']);
    $cotime = mysqli_real_escape_string($con, $_POST['cotime']);
    $adult = mysqli_real_escape_string($con, $_POST['adult']);
    $child = mysqli_real_escape_string($con, $_POST['child']);
    $rooms = mysqli_real_escape_string($con, $_POST['rooms']);

    $query = "UPDATE register SET fname='$fname', phone='$phone', address='$address', gender='$gender', email='$email', checkindate='$checkindate', checkoutdate='$checkoutdate', citime='$citime', cotime='$cotime', adult='$adult', child='$child', rooms='$rooms' WHERE register_id='$client_id'";
    $query_run = mysqli_query($con, $query);

    if($query_run)
    {
        $_SESSION['message'] = "Client Updated Successfully";
        header("Location: registration.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Client Not Updated";
        header("Location: registeration.php");
        exit(0);
    }

}


if(isset($_POST['submit']))
{
    $fname = mysqli_real_escape_string($con, $_POST['fname']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $address = mysqli_real_escape_string($con, $_POST['address']);
    $gender = mysqli_real_escape_string($con, $_POST['gender']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $checkindate = mysqli_real_escape_string($con, $_POST['checkindate']);
    $checkoutdate = mysqli_real_escape_string($con, $_POST['checkoutdate']);
    $citime = mysqli_real_escape_string($con, $_POST['citime']);
    $cotime = mysqli_real_escape_string($con, $_POST['cotime']);
    $adult = mysqli_real_escape_string($con, $_POST['adult']);
    $child = mysqli_real_escape_string($con, $_POST['child']);
    $rooms = mysqli_real_escape_string($con, $_POST['rooms']);

    $query = "INSERT INTO register (fname, phone, address, gender, email, checkindate, checkoutdate, citime, cotime, adult, child, rooms) VALUES ('$fname', '$phone', '$address', '$gender', '$email', '$checkindate', '$checkoutdate', '$citime', '$cotime', '$adult', '$child', '$rooms')";

    $query_run = mysqli_query($con, $query);
    if($query_run)
    {
        $_SESSION['message'] = "New Client Created Successfully";
        header("Location: add-user.php");
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Client Not Created";
        header("Location: add-user.php");
        exit(0);
    }
}

?>
