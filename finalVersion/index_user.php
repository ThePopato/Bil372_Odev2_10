<?php  include('crud_users.php'); ?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'odev2');
if (isset($_GET['edit'])) {
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM users WHERE AuthenticationID='{$_GET['edit']}'");

    if ($record ) {
        $n = mysqli_fetch_array($record);
        $AuthenticationID = $n['AuthenticationID'];
        $Password = $n['Password'];
        $Username = $n['Username'];

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
$results = mysqli_query($db, "SELECT * FROM users"); ?>
<table>
    <thead>
    <tr>
        <th>AuthenticationID</th>
        <th>Password</th>
        <th>Username</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>

    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['AuthenticationID']; ?></td>
            <td><?php echo $row['Password']; ?></td>
            <td><?php echo $row['Username']; ?></td>
            <td>
                <a href="index_user.php?edit=<?php echo $row['AuthenticationID']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="crud_users.php?del=<?php echo $row['AuthenticationID']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
<form method="post" action="crud_users.php" >
    <div class="input-group">
        <label>AuthenticationID</label>
        <input type="number" name="AuthenticationID" value="<?php echo $AuthenticationID; ?>">
    </div>
    <div class="input-group">
        <label>Password</label>
        <input type="text" name="Password" value="<?php echo $Password; ?>">
    </div>
    <div class="input-group">
        <label>Username</label>
        <input type="text" name="Username" value="<?php echo $Username; ?>">
    </div>
    <div class="input-group">
        <?php if ($update == true): ?>
            <button class="btn" type="submit" name="update" style="background: #556B2F;" >update</button>
        <?php else: ?>
            <button class="btn" type="submit" name="save" >Save</button>
        <?php endif ?>
    </div>
</form>
</body>
</html>