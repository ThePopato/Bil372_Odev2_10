<?php  include('crud_usersinfo.php'); ?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'odev2');
if (isset($_GET['edit'])) {
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM usersinfo WHERE AuthenticationID='{$_GET['edit']}'");

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
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD users</title>
    <link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
<?php if (isset($_SESSION['message'])): ?>
    <div class="msg">
        <?php
        echo $_SESSION['message'];
        unset($_SESSION['message']);
        ?>
    </div>
<?php endif ?>
<?php $db =mysqli_connect('localhost', 'root', '', 'odev2');
$results = mysqli_query($db, "SELECT * FROM usersinfo"); ?>
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
                <a href="index_usersinfo.php?edit=<?php echo $row['ConfID']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="crud_usersinfo.php?del=<?php echo $row['ConfID']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
<form method="post" action="crud_usersinfo.php" >
    <div class="input-group">
        <label>AuthenticationID</label>
        <input type="number" name="AuthenticationID" value="<?php echo $AuthenticationID; ?>">
    </div>
    <div class="input-group">
        <label>Title</label>
        <input type="text" name="Title" value="<?php echo $Title; ?>">
    </div>
    <div class="input-group">
        <label>Name</label>
        <input type="text" name="Name" value="<?php echo $Name; ?>">
    </div>
    <div class="input-group">
        <label>LastName</label>
        <input type="text" name="LastName" value="<?php echo $LastName; ?>">
    </div>
    <div class="input-group">
        <label>Affiliation</label>
        <input type="text" name="Affiliation" value="<?php echo $Affiliation; ?>">
    </div>
    <div class="input-group">
        <label>primary_email</label>
        <input type="text" name="primary_email" value="<?php echo $primary_email; ?>">
    </div>
    <div class="input-group">
        <label>secondary_email</label>
        <input type="text" name="secondary_email" value="<?php echo $secondary_email; ?>">
    </div>
    <div class="input-group">
        <label>password</label>
        <input type="password" name="password" value="<?php echo $password; ?>">
    </div>
    <div class="input-group">
        <label>phone</label>
        <input type="text" name="phone" value="<?php echo $phone; ?>">
    </div>
    <div class="input-group">
        <label>fax</label>
        <input type="text" name="fax" value="<?php echo $fax; ?>">
    </div>
    <div class="input-group">
        <label>URL</label>
        <input type="text" name="URL" value="<?php echo $URL; ?>">
    </div>
    <div class="input-group">
        <label>Address</label>
        <input type="text" name="Address" value="<?php echo $Address; ?>">
    </div>
    <div class="input-group">
        <label>City</label>
        <input type="text" name="City" value="<?php echo $City; ?>">
    </div>
    <div class="input-group">
        <label>Country</label>
        <input type="text" name="Country" value="<?php echo $Country; ?>">
    </div>
    <div class="input-group">
        <label>Record</label>
        <input type="text" name="Record" value="<?php echo $Record; ?>">
    </div>
    <div class="input-group">
        <label>Creation</label>
        <input type="text" name="Creation" value="<?php echo $Creation; ?>">
    </div>
    <div class="input-group">
        <label>Date</label>
        <input type="date" name="Date" value="<?php echo $Date; ?>">
    </div>
    <?php if ($update == true): ?>
        <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
    <?php else: ?>
        <button class="btn" type="submit" name="save" >Save</button>
    <?php endif ?>
    </div>
</form>
</body>
</html>
