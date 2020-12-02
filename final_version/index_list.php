<!DOCTYPE html>
<html>
<head>
    <title>CRUD</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>

<?php

$db =mysqli_connect('localhost', 'root', '', 'odev2');


$results = mysqli_query($db, "SELECT * FROM userlog "); ?>
<table>
    <thead>
    <tr>
        <th>AuthenticationID</th>
        <th>Title</th>
        <th>Name</th>
        <th>LastName</th>
        <th>Affiliation</th>
        <th>primary_email</th>
        <th>secondary_email</th>
        <th>password</th>
        <th>phone</th>
        <th>fax</th>
        <th>URL</th>
        <th>Address</th>
        <th>City</th>
        <th>Country</th>
        <th>Record</th>
        <th>Creation</th>
        <th>Date</th>
        <th colspan="17">Action</th>
    </tr>
    </thead>

    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['AuthenticationID']; ?></td>
            <td><?php echo $row['Title']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['LastName']; ?></td>
            <td><?php echo $row['Affiliation']; ?></td>
            <td><?php echo $row['primary_email']; ?></td>
            <td><?php echo $row['secondary_email']; ?></td>
            <td><?php echo $row['password']; ?></td>
            <td><?php echo $row['phone']; ?></td>
            <td><?php echo $row['fax']; ?></td>
            <td><?php echo $row['URL']; ?></td>
            <td><?php echo $row['Address']; ?></td>
            <td><?php echo $row['City']; ?></td>
            <td><?php echo $row['Country']; ?></td>
            <td><?php echo $row['Record']; ?></td>
            <td><?php echo $row['Creation']; ?></td>
            <td><?php echo $row['Date']; ?></td>
            <td>
                <a href="index_userinfo.php?edit=<?php echo $row['AuthenticationID']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="crud_userinfo.php?del=<?php echo $row['AuthenticationID']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>