<?php
//include "config.php";
session_start();
$db = mysqli_connect('localhost', 'root', '', 'odev2');
/*$name = "";
$address = "";
$id = 0;*/
$update = false;

if (isset($_POST['save'])) {
    $ConfIDRole = $_POST['ConfIDRole'];
    $AuthenticationID = $_POST['AuthenticationID'];

    mysqli_query($db,"INSERT INTO `conferenceroles` (`ConfIDRole`, `AuthenticationID`) VALUES ('$ConfIDRole', '$AuthenticationID')");
    $_SESSION['message'] = "Address saved";

    if (isset($_POST['update'])) {
        $ConfIDRole = $_POST['ConfIDRole'];
        $AuthenticationID = $_POST['AuthenticationID'];

        mysqli_query($db, "UPDATE conferenceroles SET ConfIDRole='$ConfIDRole', AuthenticationID='$AuthenticationID' WHERE ConfIDRole=$ConfIDRole");
        $_SESSION['message'] = "Address updated!";
        header('location: index.php');
    }

    if (isset($_GET['del'])) {
        $ConfIDRole = $_GET['del'];
        mysqli_query($db, "DELETE FROM conferenceroles WHERE ConfIDRole=$ConfIDRole");
        $_SESSION['message'] = "deleted!";
    }

    header('location: index.php');
}

