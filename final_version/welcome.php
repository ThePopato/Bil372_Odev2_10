<?php
// Initialize the session
session_start();
 
// Check if the user is logged in, if not then redirect him to login page
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.css">
    <style type="text/css">
        body{ font: 14px sans-serif; text-align: center; }
    </style>
</head>
<body>
    <div class="page-header">
        <h1>Hi, <b><?php echo htmlspecialchars($_SESSION["username"]); ?></b>. Welcome to our site.</h1>
    </div>
    <p>
        <a href="reset-password.php" class="btn btn-warning">Reset Your Password</a>
        <a href="logout.php" class="btn btn-danger">Sign Out of Your Account</a>
        <br></br>
        <a href="index_list.php" class="btn btn-danger">List</a>
        <br></br>
        <a href="index_user.php" class="btn btn-danger">Users</a>
        <br></br>
        <a href="index_usersinfo.php" class="btn btn-danger">User Information</a>
        <br></br>
        <a href="adminDisplayUsers.php" class="btn btn-danger">User Display</a>
        <br></br>
        <a href="index_conference.php" class="btn btn-danger">Conferences</a>
        <br></br>
        <a href="index.php" class="btn btn-danger">Conference Roles</a>
        <br></br>
        <a href="index_conference_tags.php" class="btn btn-danger">Conference Tags</a>
        <br></br>
        <a href="index_submissions.php" class="btn btn-danger">Submissions</a>
    </p>
</body>
</html>