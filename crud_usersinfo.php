<?php
session_start();
$db = mysqli_connect('localhost', 'root', '', 'odev2');

$update = false;

if (isset($_POST['save'])) {


    $record = mysqli_query($db, "SELECT * FROM usersinfo WHERE AuthenticationID='{$_POST['save']}'");

    if ($record ) {
        $n = mysqli_fetch_array($record);
        $AuthenticationID = $n['AuthenticationID'];
        $Title = $n['Title'];
        $Name = $n['Name'];
        $LastName = $n['LastName'];
        $Affiliation = $n['Affiliation'];
        $primary_email = $n['primary_email'];
        $secondary_email = $n['secondary_email'];
        $password = $n['password'];
        $phone = $n['phone'];
        $fax = $n['fax'];
        $URL = $n['URL'];
        $Address = $n['Address'];
        $City = $n['City'];
        $Country = $n['Country'];
        $Record = $n['Record'];
        $Creation = $n['Creation'];
        $Date = $n['Date'];
    }
    
    $query = "INSERT INTO userlog (AuthenticationID, Title, Name, LastName, Affiliation, primary_email, secondary_email, password, phone, fax, URL, Address, City, Country, Record, Creation, Date)
VALUES('{$_POST['AuthenticationID']}','$Title','$Name','$LastName','$Affiliation', '$primary_email','$secondary_email','$password','$phone','$fax','$URL','$Address','$City','$Country','$Record','$Creation','$Date')";
    $tst=mysqli_query($db, $query);
    if($tst)
        $_SESSION['message'] = 'Entry Saved1';
    else
        $_SESSION['message'] = 'An error occurs. Please enter valid values1';

    $w = "DELETE FROM usersinfo WHERE AuthenticationID='{$_POST['AuthenticationID']}'";

    $query = "INSERT INTO usersinfo (AuthenticationID, Title, Name, LastName, Affiliation, primary_email, secondary_email, password, phone, fax, URL, Address, City, Country, Record, Creation, Date)
VALUES('{$_POST['AuthenticationID']}','{$_POST['Title']}','{$_POST['Name']}','{$_POST['LastName']}','{$_POST['Affiliation']}', '{$_POST['primary_email']}','{$_POST['secondary_email']}','{$_POST['password']}','{$_POST['phone']}','{$_POST['fax']}','{$_POST['URL']}','{$_POST['Address']}','{$_POST['City']}','{$_POST['Country']}','{$_POST['Record']}','{$_POST['Creation']}','{$_POST['Date']}')";
    $test=mysqli_query($db, $query);
    header('location: index_usersinfo.php');
}

if (isset($_POST['update'])) {

    $m=mysqli_query($db, "UPDATE usersinfo SET AuthenticationID='{$_POST['AuthenticationID']}',Title='{$_POST['Title']}',Name='{$_POST['Name']}',LastName='{$_POST['LastName']}',Affiliation='{$_POST['Affiliation']}', primary_email='{$_POST['primary_email']}',secondary_email='{$_POST['secondary_email']}',password='{$_POST['password']}',phone='{$_POST['phone']}',Fax='{$_POST['fax']}',URL='{$_POST['URL']}',Address='{$_POST['Address']}',City='{$_POST['City']}',Country='{$_POST['Country']}',Record='{$_POST['Record']}',Creation='{$_POST['Creation']}',Date='{$_POST['Date']}' WHERE ConfID='{$_POST['ConfID']}'");
    if($m)
        $_SESSION['message'] = "updated!";
    else
        $_SESSION['message'] = "cannot update!";
    header('location: index_usersinfo.php');
}

if (isset($_GET['del'])) {
    $p=mysqli_query($db, "DELETE FROM usersinfo WHERE ConfID='{$_GET['del']}'");
    if($p)
        $_SESSION['message'] = "deleted!";
    else
        $_SESSION['message'] = "An error occurs! Cannot deleted!";
    header('location: index_usersinfo.php');
}