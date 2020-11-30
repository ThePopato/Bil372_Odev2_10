<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'odev2');

// initialize variables
/*$ConfID = "";
$CreationDateTime = "";
$Name = "";
$ShortName = "";
$Year = 0;
$StartDate = "";
$EndDate = "";
$Submission_Deadline = "";
$CreatorUser = 0;
$WebSite = "";*/
$update = false;

if (isset($_POST['save'])) {
    $Name = $_POST['name'];
    $WebSite = $_POST['WebSite'];
    $ConfID = $_POST['$ConfID'];
    $ShortName = $_POST['ShortName'];
    $CreatorUser = $_POST['CreatorUser'];
    $Year = $_POST['Year'];
    $StartDate = $_POST['StartDate'];
    $EndDate = $_POST['EndDate'];
    $Submission_Deadline = $_POST['Submission_Deadline'];
    $CreationDateTime = $_POST['CreationDateTime'];



    $query = "INSERT INTO conference (ConfID, CreationDateTime, Name, ShortName, Year, StartDate, EndDate, Submission_Deadline, CreatorUser, WebSite) 
   VALUES ('$ConfID', '$CreationDateTime', '$Name', '$ShortName', '$ShortName', '$Year', '$StartDate', '$EndDate', '$Submission_Deadline', '$CreatorUser', '$WebSite')";
    mysqli_query($db, $query);
    $_SESSION['message'] = "saved";

    if (isset($_POST['update'])) {
        $ConfID = $_POST['ConfID'];
        $CreationDateTime = $_POST['CreationDateTime'];
        $Name = $_POST['Name'];
        $ShortName = $_POST['ShortName'];
        $Year = $_POST['Year'];
        $StartDate = $_POST['StartDate'];
        $EndDate = $_POST['EndDate'];
        $SubmissionDeadline = $_POST['SubmissionDeadline'];
        $CreatorUser = $_POST['CreatorUser'];
        $WebSite = $_POST['WebSite'];

        mysqli_query($db, "UPDATE info SET ConfID='$ConfID', CreationDateTime='$CreationDateTime', Name='$Name', ShortName='$ShortName', Year='$Year', StartDate='$StartDate', EndDate='$EndDate', SubmissionDeadline='$SubmissionDeadline', CreatorUser='$CreatorUser', WebSite='$WebSite' WHERE ConfID=$ConfID");
        $_SESSION['message'] = "updated!";
        header('location: index.php');
    }

    if (isset($_GET['del'])) {
        $ConfIDRole = $_GET['del'];
        mysqli_query($db, "DELETE FROM conference WHERE ConfID=$ConfID");
        $_SESSION['message'] = "deleted!";
    }

    header('location: index.php');
}
