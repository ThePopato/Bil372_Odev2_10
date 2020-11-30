<?php  include('server.php'); ?>
<?php
$db = mysqli_connect('localhost', 'root', '', 'odev2');
if (isset($_GET['edit'])) {
    $id = $_GET['edit'];
    $update = true;
    $record = mysqli_query($db, "SELECT * FROM conference WHERE ConfID=$id");

    if (count($record) == 1 ) {
        $n = mysqli_fetch_array($record);
        $ConfID = $n['ConfID'];
        $CreationDateTime = $n['CreationDateTime'];
        $Name = $n['Name'];
        $ShortName = $n['ShortName'];
        $Year = $n['Year'];
        $StartDate = $n['StartDate'];
        $EndDate = $n['EndDate'];
        $SubmissionDeadline = $n['SubmissionDeadline'];
        $CreatorUser = $n['CreatorUser'];
        $WebSite = $n['WebSite'];
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
<?php
$db =mysqli_connect('localhost', 'root', '', 'odev2');
$results = mysqli_query($db, "SELECT * FROM conference"); ?>
<table>
    <thead>
    <tr>
        <th>ConfID</th>
        <th>CreationDateTime</th>
        <th>Name</th>
        <th>ShortName</th>
        <th>Year</th>
        <th>StartDate</th>
        <th>EndDate</th>
        <th>SubmissionDeadline</th>
        <th>CreatorUser</th>
        <th>WebSite</th>
        <th colspan="10">Action</th>
    </tr>
    </thead>

    <?php while ($row = mysqli_fetch_array($results)) { ?>
        <tr>
            <td><?php echo $row['ConfID']; ?></td>
            <td><?php echo $row['CreationDateTime']; ?></td>
            <td><?php echo $row['Name']; ?></td>
            <td><?php echo $row['ShortName']; ?></td>
            <td><?php echo $row['Year']; ?></td>
            <td><?php echo $row['StartDate']; ?></td>
            <td><?php echo $row['EndDate']; ?></td>
            <td><?php echo $row['SubmissionDeadline']; ?></td>
            <td><?php echo $row['CreatorUser']; ?></td>
            <td><?php echo $row['WebSite']; ?></td>
            <td>
                <a href="index.php?edit=<?php echo $row['ConfID']; ?>" class="edit_btn" >Edit</a>
            </td>
            <td>
                <a href="server.php?del=<?php echo $row['ConfID']; ?>" class="del_btn">Delete</a>
            </td>
        </tr>
    <?php } ?>
</table>
<form method="post" action="server.php" >
    <div class="input-group">
        <label>ConfID</label>
        <input type="text" name="ConfID" value="<?php echo $ConfID; ?>">
    </div>
    <div class="input-group">
        <label>CreationDateTime</label>
        <input type="date" name="CreationDateTime" value="<?php echo $CreationDateTime; ?>">
    </div>
    <div class="input-group">
        <label>Name</label>
        <input type="text" name="Name" value="<?php echo $Name; ?>">
    </div>
    <div class="input-group">
        <label>ShortName</label>
        <input type="text" name="ShortName" value="<?php echo $ShortName; ?>">
    </div>
    <div class="input-group">
        <label>Year</label>
        <input type="number" name="Year" value="<?php echo $Year; ?>">
    </div>
    <div class="input-group">
        <label>StartDate</label>
        <input type="date" name="StartDate" value="<?php echo $StartDate; ?>">
    </div>
    <div class="input-group">
        <label>EndDate</label>
        <input type="date" name="EndDate" value="<?php echo $EndDate; ?>">
    </div>
    <div class="input-group">
        <label>Submission Deadline</label>
        <input type="date" name="Submission_Deadline" value="<?php echo $SubmissionDeadline; ?>">
    </div>
    <div class="input-group">
        <label>CreatorUser</label>
        <input type="number" name="CreatorUser" value="<?php echo $CreatorUser; ?>">
    </div>
    <div class="input-group">
        <label>WebSite</label>
        <input type="text" name="WebSite" value="<?php echo $WebSite; ?>">
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