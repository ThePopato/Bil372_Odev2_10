<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'odev2');

$update = false;

if (isset($_POST['save'])) {


    $query = "INSERT INTO submissions (AuthenticationID,ConfID,SubmissionID,prevSubmissionID)
VALUES('{$_POST['AuthenticationID']}','{$_POST['ConfID']}','{$_POST['SubmissionID']}','{$_POST['prevSubmissionID']}')";
    $test=mysqli_query($db, $query);


    if($test)
        $_SESSION['message'] = 'Entry Saved';
    else
        $_SESSION['message'] = 'An error occurs. Please enter valid values';


    header('location: index_submissions.php');
}

if (isset($_POST['update'])) {

    $m=mysqli_query($db, "UPDATE submissions SET AuthenticationID='{$_POST['AuthenticationID']}',ConfID='{$_POST['ConfID']}',prevSubmissionID='{$_POST['prevSubmissionID']}' WHERE SubmissionID='{$_POST['SubmissionID']}'");
    if($m)
        $_SESSION['message'] = "updated!";
    else
        $_SESSION['message'] = "cannot update!";
    header('location: index_submissions.php');
}

if (isset($_GET['del'])) {
    $p=mysqli_query($db, "DELETE FROM submissions WHERE SubmissionID='{$_GET['del']}'");
    if($p)
        $_SESSION['message'] = "deleted!";
    else
        $_SESSION['message'] = "An error occurs! Cannot deleted!";
    header('location: index_submissions.php');
}