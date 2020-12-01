<?php  include('crud_submissions.php'); ?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'odev2');
if (isset($_GET['edit'])) {
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM submissions WHERE SubmissionID='{$_GET['edit']}'");

    if ($record ) {
        $n = mysqli_fetch_array($record);
        $AuthenticationID = $n['AuthenticationID'];
        $ConfID = $n['ConfID'];
        $SubmissionID = $n['SubmissionID'];
        $prevSubmissionID = $n['prevSubmissionID'];
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
<?php $db =mysqli_connect('localhost', 'root', '', 'odev2');
$results = mysqli_query($db, "SELECT * FROM submissions"); ?>
<table>
    <thead>
    <tr>
        <th>AuthenticationID</th>
        <th>ConfID</th>
        <th>SubmissionID</th>
        <th>prevSubmissionID</th>
        <th colspan="4">Action</th>
    </tr>
    </thead>

    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['AuthenticationID']; ?></td>
            <td><?php echo $row['ConfID']; ?></td>
            <td><?php echo $row['SubmissionID']; ?></td>
            <td><?php echo $row['prevSubmissionID']; ?></td>
            <td>
                <a href="index_submissions.php?edit=<?php echo $row['SubmissionID']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="crud_submissions.php?del=<?php echo $row['SubmissionID']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
<form method="post" action="crud_submissions.php" >
    <div class="input-group">
        <label>AuthenticationID</label>
        <input type="number" name="AuthenticationID" value="<?php echo $AuthenticationID; ?>">
    </div>
    <div class="input-group">
        <label>ConfID</label>
        <input type="text" name="ConfID" value="<?php echo $ConfID; ?>">
    </div>
    <div class="input-group">
        <label>SubmissionID</label>
        <input type="number" name="SubmissionID" value="<?php echo $SubmissionID; ?>">
    </div>
    <div class="input-group">
        <label>prevSubmissionID</label>
        <input type="number" name="prevSubmissionID" value="<?php echo $prevSubmissionID; ?>">
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