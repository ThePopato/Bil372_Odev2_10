<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>Kayıt Olun!</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>
<?php
require('config.php');
// If form submitted, insert values into the database.
if (isset($_REQUEST['username'])){
        // removes backslashes
 $username = stripslashes($_REQUEST['username']);
        //escapes special characters in a string
 $username = mysqli_real_escape_string($link,$username); 
 
 $password = stripslashes($_REQUEST['password']);
 $password = mysqli_real_escape_string($link,$password);

 $affiliation = stripslashes($_REQUEST['affiliation']);
 $affiliation = mysqli_real_escape_string($link,$affiliation);

 $title = stripslashes($_REQUEST['title']);
 $title = mysqli_real_escape_string($link,$title);

 $personname = stripslashes($_REQUEST['personName']);
 $personname = mysqli_real_escape_string($link,$personname);

 $personsurname = stripslashes($_REQUEST['personSurname']);
 $personsurname = mysqli_real_escape_string($link,$personsurname);

 $email1 = stripslashes($_REQUEST['email1']);
 $email1 = mysqli_real_escape_string($link,$email1);

 $email2 = stripslashes($_REQUEST['email2']);
 $email2 = mysqli_real_escape_string($link,$email2);
 
 $phone = stripslashes($_REQUEST['phone']);
 $phone = mysqli_real_escape_string($link,$phone);

 $fax = stripslashes($_REQUEST['fax']);
 $fax = mysqli_real_escape_string($link,$fax);

 $address = stripslashes($_REQUEST['address']);
 $address = mysqli_real_escape_string($link,$address);

 $country = stripslashes($_REQUEST['country']);
 $country = mysqli_real_escape_string($link,$country);

 $city = stripslashes($_REQUEST['city']);
 $city = mysqli_real_escape_string($link,$city);

 $date = date("Y-m-d H:i:s");
 
 $query_users = "INSERT into `users` (username, password) VALUES ('$username', '".md5($password)."')";
 
 $query_userlog = "INSERT into `userlog` 
 (Title, `Name`, LastName, Affiliation primary_email, secondary_email, `password`,
 phone, fax, `URL`, `Address`, `City`, Country, Record, Creation, `Date`) 
 VALUES ('$title', '$personname', '$personsurname', '$email1', '$email2', '".md5($password)."',
 '$phone', '$fax', 'url', '$address', '$city', '$country', 'record', 'creation',  '$date')";
 
 $query_usersinfo = "INSERT into `usersinfo` (Title, `Name`, LastName, Affiliation primary_email, secondary_email, `password`,
 phone, fax, `URL`, `Address`, `City`, Country, Record, Creation, `Date`) 
 VALUES ('$title', '$personname', '$personsurname', '$email1', '$email2', '".md5($password)."',
 '$phone', '$fax', 'url', '$address', '$city', '$country', 'record', 'creation',  '$date')";
        
        $result1 = mysqli_query($link,$query_users);
        $result2 = mysqli_query($link,$query_userlog);
        $result3 = mysqli_query($link,$query_usersinfo);
        if($result1){
            echo "<div class='form'>
<h3>You are registered successfully.</h3>
<br/>Click here to <a href='login.php'>Login</a></div>";
        }
    }else{
?>
<div class="form">
<h1>Kayıt Olun</h1>
<form name="registration" action="" method="post">

<input type="text" name="username" placeholder="Username" required />
<br></br>
<input type="password" name="password" placeholder="Password" required />
<br></br>
<input type="text" name="affiliation" placeholder="Company" required />
<br></br>
<input type="text" name="title" placeholder="Title" required />
<br></br>
<input type="text" name="personName" placeholder="Name" required />
<br></br>
<input type="text" name="personSurname" placeholder="Surname" required />
<br></br>
<input type="email" name="email1" placeholder="Email" required />
<br></br>
<input type="email" name="email2" placeholder="Email" required />
<br></br>
<input type="tel" name="phone" placeholder="Phone Number" required />
<br></br>
<input type="tel" name="fax" placeholder="Fax Number" required />
<br></br>
<input type="text" name="address" placeholder="Address" required />
<br></br>
<input type="text" name="country" placeholder="Country" required />
<br></br>
<input type="text" name="city" placeholder="City" required />
<br></br>
<input type="submit" name="submit" value="Register" />
</form>
</div>
<?php } ?>
</body>
</html>