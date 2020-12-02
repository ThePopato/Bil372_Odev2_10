<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'odev2');

$update = false;

if (isset($_POST['save'])) {


    $query = "INSERT INTO conferencetags (ConfID,Tag,tag1,tag2,tag3,tag4)
VALUES('{$_POST['ConfID']}','{$_POST['Tag']}','{$_POST['tag1']}','{$_POST['tag2']}','{$_POST['tag3']}','{$_POST['tag4']}')";
    $test=mysqli_query($db, $query);


    if($test)
        $_SESSION['message'] = 'Entry Saved';
    else
        $_SESSION['message'] = 'An error occurs. Please enter valid values';


    header('location: index_conference_tags.php');
}

if (isset($_POST['update'])) {

    $m=mysqli_query($db, "UPDATE conferencetags SET Tag='{$_POST['Tag']}',tag='{$_POST['tag1']}',tag2='{$_POST['tag2']}',tag3='{$_POST['tag3']}', tag4='{$_POST['tag4']}' WHERE ConfID='{$_POST['ConfID']}'");
    if($m)
        $_SESSION['message'] = "updated!";
    else
        $_SESSION['message'] = "cannot update!";
    header('location: index_conference_tags.php');
}

if (isset($_GET['del'])) {
    $p=mysqli_query($db, "DELETE FROM conferencetags WHERE ConfID='{$_GET['del']}'");
    if($p)
        $_SESSION['message'] = "deleted!";
    else
        $_SESSION['message'] = "An error occurs! Cannot deleted!";
    header('location: index_conference_tags.php');
}