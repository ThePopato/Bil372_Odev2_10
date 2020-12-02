<?php
//include "config.php";
session_start();
$db = mysqli_connect('localhost', 'root', '', 'odev2');
/*$name = "";
$address = "";
$id = 0;*/
$update = false;

if (isset($_POST['save'])) {


    $query = "INSERT INTO conferenceroles (ConfID,Role,AuthenticationID)
VALUES('{$_POST['ConfID']}','{$_POST['Role']}','{$_POST['AuthenticationID']}')";
    $test=mysqli_query($db, $query);


    if($test)
        $_SESSION['message'] = 'Entry Saved';
    else
        $_SESSION['message'] = 'An error occurs. Please enter valid values';


    header('location: index.php');
}

if (isset($_POST['update'])) {

    $m=mysqli_query($db, "UPDATE conferenceroles SET ConfID='{$_POST['ConfID']}', Role='{$_POST['Role']}' WHERE AuthenticationID='{$_POST['AuthenticationID']}'");
    if($m)
        $_SESSION['message'] = "updated!";
    else
        $_SESSION['message'] = "cannot update!";
    header('location: index.php');
}

if (isset($_GET['del'])) {
    $p=mysqli_query($db, "DELETE FROM conferenceroles WHERE  AuthenticationID='{$_GET['del']}'");
    if($p)
        $_SESSION['message'] = "deleted!";
    else
        $_SESSION['message'] = "An error occurs! Cannot deleted!";
    header('location: index.php');
}