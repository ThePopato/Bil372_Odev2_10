<?php  include('crud_conferencetags.php'); ?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'odev2');
if (isset($_GET['edit'])) {
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM conferencetags WHERE ConfID='{$_GET['edit']}'");

    if ($record ) {
        $n = mysqli_fetch_array($record);
        $ConfID = $n['ConfID'];
        $Tag = $n['Tag'];
        $tag1 = $n['tag1'];
        $tag2 = $n['tag2'];
        $tag3 = $n['tag3'];
        $tag4 = $n['tag4'];
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
$results = mysqli_query($db, "SELECT * FROM conferencetags"); ?>
<table>
    <thead>
    <tr>
        <th>ConfID</th>
        <th>Tag</th>
        <th>tag1</th>
        <th>tag2</th>
        <th>tag3</th>
        <th>tag4</th>
        <th colspan="3">Action</th>
    </tr>
    </thead>

    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['ConfID']; ?></td>
            <td><?php echo $row['Tag']; ?></td>
            <td><?php echo $row['tag1']; ?></td>
            <td><?php echo $row['tag2']; ?></td>
            <td><?php echo $row['tag3']; ?></td>
            <td><?php echo $row['tag4']; ?></td>
            <td>
                <a href="index_conference_tags.php?edit=<?php echo $row['ConfID']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="crud_conferencetags.php?del=<?php echo $row['ConfID']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
<form method="post" action="crud_conferencetags.php" >
    <div class="input-group">
        <label>ConfID</label>
        <input type="text" name="ConfID" value="<?php echo $ConfID; ?>">
    </div>
    <div class="input-group">
        <label>Tag</label>
        <input type="text" name="Tag" value="<?php echo $Tag; ?>">
    </div>
    <div class="input-group">
        <label>Tag 1</label>
        <input type="text" name="tag1" value="<?php echo $tag1; ?>">
    </div>
    <div class="input-group">
        <label>Tag 2</label>
        <input type="text" name="tag2" value="<?php echo $tag2; ?>">
    </div>
    <div class="input-group">
        <label>Tag 3</label>
        <input type="text" name="tag3" value="<?php echo $tag3; ?>">
    </div>
    <div class="input-group">
        <label>Tag 4</label>
        <input type="text" name="tag4" value="<?php echo $tag4; ?>">
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