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
$SubmissionDeadline = "";
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
    $SubmissionDeadline = $_POST['SubmissionDeadline'];
    $CreationDateTime = $_POST['CreationDateTime'];

    /*$sql2="INSERT INTO conference (ConfID, CreationDateTime, Name, ShortName, Year, StartDate, EndDate, SubmissionDeadline, CreatorUser, WebSite)
VALUES('{$_POST['ConfID']}','{$_POST['CreationDateTime']}','{$_POST['Name']}','{$_POST['ShortName']}','{$_POST['Year']}', '{$_POST['StartDate']}','{$_POST['EndDate']}','{$_POST['SubmissionDeadline']}','{$_POST['CreatorUser']}','{$_POST['WebSite']}')";
*/


    $query = "INSERT INTO conference (ConfID, CreationDateTime, Name, ShortName, Year, StartDate, EndDate, SubmissionDeadline, CreatorUser, WebSite)
VALUES('{$_POST['ConfID']}','{$_POST['CreationDateTime']}','{$_POST['Name']}','{$_POST['ShortName']}','{$_POST['Year']}', '{$_POST['StartDate']}','{$_POST['EndDate']}','{$_POST['SubmissionDeadline']}','{$_POST['CreatorUser']}','{$_POST['WebSite']}')";
    $test=mysqli_query($db, $query);
    

    if($test)
        $_SESSION['message'] = 'Entry Saved';
    else
        $_SESSION['message'] = 'An error occurs. Please enter valid values';


    header('location: index_conference.php');
}
if (isset($_POST['update'])) {
    /*$ConfID = $_POST['ConfID'];
    $CreationDateTime = $_POST['CreationDateTime'];
    $Name = $_POST['Name'];
    $ShortName = $_POST['ShortName'];
    $Year = $_POST['Year'];
    $StartDate = $_POST['StartDate'];
    $EndDate = $_POST['EndDate'];
    $SubmissionDeadline = $_POST['SubmissionDeadline'];
    $CreatorUser = $_POST['CreatorUser'];
    $WebSite = $_POST['WebSite'];*/

    $testt=mysqli_query($db, "UPDATE conference SET ConfID='{$_POST['ConfID']}', CreationDateTime='{$_POST['CreationDateTime']}', Name='{$_POST['Name']}', ShortName='{$_POST['ShortName']}', Year='{$_POST['Year']}', StartDate='{$_POST['StartDate']}', EndDate='{$_POST['EndDate']}', SubmissionDeadline='{$_POST['SubmissionDeadline']}', CreatorUser='{$_POST['CreatorUser']}', WebSite='{$_POST['WebSite']}' WHERE ConfID='{$_POST['ConfID']}'");
    if($testt)
        $_SESSION['message'] = "updated!";
    else
        $_SESSION['message'] = "An Error occurs! Please enter valid values";
    header('location: index_conference.php');

}

if (isset($_GET['del'])) {
    $ConfID = $_GET['del'];
    $m=mysqli_query($db, "DELETE FROM conference WHERE ConfID='$ConfID'");
    if(m)
        $_SESSION['message'] = "deleted!";
    else
        $_SESSION['message'] = "cannot delete!";
    header('location: index_conference.php');

}