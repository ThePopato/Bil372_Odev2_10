<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'odev2');

$update = false;

if (isset($_POST['save'])) {


    $query = "INSERT INTO users (AuthenticationID, Password ,Username)
VALUES('{$_POST['AuthenticationID']}','{$_POST['Password']}','{$_POST['Username']}')";
    $test=mysqli_query($db, $query);


    if($test)
        $_SESSION['message'] = 'Entry Saved';
    else
        $_SESSION['message'] = 'An error occurs. Please enter valid values';


    header('location: index_user.php');
}

if (isset($_POST['update'])) {

    $m=mysqli_query($db, "UPDATE users SET AuthenticationID='{$_POST['AuthenticationID']}', Password='{$_POST['Password']}' , Username='{$_POST['Username']}' WHERE AuthenticationID='{$_POST['AuthenticationID']}'");
    if($m)
        $_SESSION['message'] = "updated!";
    else
        $_SESSION['message'] = "cannot update!";
    header('location: index_user.php');
}

if (isset($_GET['del'])) {
    $p=mysqli_query($db, "DELETE FROM users WHERE  AuthenticationID='{$_GET['del']}'");
    if($p)
        $_SESSION['message'] = "deleted!";
    else
        $_SESSION['message'] = "An error occurs! Cannot deleted!";
    header('location: index_user.php');
}