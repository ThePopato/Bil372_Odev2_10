<?php  include('create_conferenceroles.php'); ?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'odev2');
if (isset($_GET['edit'])) {
    $ConfIDRole = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM conferenceroles WHERE ConfIDRole=$ConfIDRole");

    if (count($record) == 1 ) {
        $n = mysqli_fetch_array($record);
        $ConfIDRole = $n['ConfIDRole'];
        $AuthenticationID = $n['AuthenticationID'];
    }
}
?>
<!DOCTYPE html>
<html>
<head>
    <title>CRUD: CReate, Update, Delete PHP MySQL</title>
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
<?php $db =mysqli_connect('localhost', 'root', '', 'crud');
$results = mysqli_query($db, "SELECT * FROM conferenceroles"); ?>
<table>
    <thead>
    <tr>
        <th>ConfIDRole</th>
        <th>Address</th>
        <th colspan="2">Action</th>
    </tr>
    </thead>

    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['ConfIDRole']; ?></td>
            <td><?php echo $row['AuthenticationID']; ?></td>
            <td>
                <a href="index.php?edit=<?php echo $row['ConfIDRole']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="server.php?del=<?php echo $row['ConfIDRole']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
<form method="post" action="create_conferenceroles.php" >
    <div class="input-group">
        <label>ConfIDRole</label>
        <input type="number" name="ConfIDRole" value="<?php echo $ConfIDRole; ?>">
    </div>
    <div class="input-group">
        <label>AuthenticationID</label>
        <input type="number" name="AuthenticationID" value="<?php echo $AuthenticationID; ?>">
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