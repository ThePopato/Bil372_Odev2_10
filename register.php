<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$name = $password = $affiliation = $title = $personname = $email1 = $email2 = $phone = $address = 
$country = $city = $confirm_password = "";
$name_err = $password_err = $confirm_aff_err = $confirm_title_err = $confirm_personname_err = 
$confirm_mail1_err = $confirm_mail2_err = $confirm_phone_err = $confirm_fax_err = 
$confirm_address_err = $confirm_country_err = $confirm_city_err =  $confirm_password_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["name"]))){
        $username_err = "Please enter a username.";
    } else{
        // Prepare a select statement
        $sql = "SELECT authentication_id, username FROM users WHERE username = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $param_name);
            
            // Set parameters
            $param_name = trim($_POST["name"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $username_err = "This username is already taken.";
                } else{
                    $username = trim($_POST["name"]);
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Validate password
    if(empty(trim($_POST["password"]))){
        $password_err = "Please enter a password.";     
    } elseif(strlen(trim($_POST["password"])) < 6){
        $password_err = "Password must have atleast 6 characters.";
    } else{
        $password = trim($_POST["password"]);
    }
    
    if(empty(trim($_POST["affiliation"]))){
        $confirm_aff_err = "Please insert affiliation.";     
    }
    else{
        $affiliation = trim($_POST["affiliation"]);
    }
    
    if(empty(trim($_POST["title"]))){
        $confirm_title_err = "Please insert title.";     
    }
    else{
        $title = trim($_POST["title"]);
    }
    
    if(empty(trim($_POST["responsName"]))){
        $confirm_personname_err = "Please insert name and surname.";     
    }
    else{
        $personname = trim($_POST["responsName"]);
    }

    if(empty(trim($_POST["email1"]))){
        $confirm_mail1_err = "Please insert a valid email address.";     
    }
    else{
        $email1 = trim($_POST["email1"]);
    }

    if(empty(trim($_POST["email2"]))){
        $confirm_mail2_err = "Please insert a valid email address.";     
    }
    else{
        $email2 = trim($_POST["email2"]);
    }

    if(empty(trim($_POST["phone"]))){
        $confirm_phone_err = "Please insert a valid phone number.";     
    }
    else{
        $phone = trim($_POST["phone"]);
    }

    if(empty(trim($_POST["faks"]))){
        $confirm_fax_err = "Please insert a valid fax number.";     
    }
    else{
        $fax = trim($_POST["faks"]);
    }

    if(empty(trim($_POST["address"]))){
        $confirm_address_err = "Please insert a valid address.";     
    }
    else{
        $address = trim($_POST["address"]);
    }

    if(empty(trim($_POST["ulkeAdi"]))){
        $confirm_country_err = "Please insert a country.";     
    }
    else{
        $country = trim($_POST["ulkeAdi"]);
    }

    if(empty(trim($_POST["sehir"]))){
        $confirm_city_err = "Please insert a city.";     
    }
    else{
        $city = trim($_POST["sehir"]);
    }


    // Check input errors before inserting in database
    if(empty($username_err) && empty($password_err) && empty($confirm_password_err)
    && empty($confirm_aff_err) && empty($confirm_title_err) && empty($confirm_personname_err)
    && empty($confirm_mail1_err) && empty($confirm_mail2_err) && empty($confirm_phone_err)
    && empty($confirm_fax_err) && empty($confirm_address_err) && empty($confirm_country_err)
    && empty($confirm_city_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, password, affiliation, title, personname, email1
                , email2, phone, fax, address, country, city) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ss", $param_username, $param_password, 
            $param_aff, $param_title, $param_name, $param_mail1
            , $param_mail2, $param_phone, $param_fax, $param_address, $param_country
            , $param_city);
            
            // Set parameters
            $param_username = $username;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_aff = $affiliation;
            $param_title = $title;
            $param_name = $personname;
            $param_mail1 = $email1;
            $param_mail2 = $email2;
            $param_phone = $phone;
            $param_fax = $fax;
            $param_address = $address;
            $param_country = $country;
            $param_city = $city;


            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
 <!DOCTYPE html>
  <html lang="en">
  <head>
  <title>Kayıt Olun!</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="{{url_for('static', filename='main.css')}}">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
  </head>
  <body>
  <div class="container">
    <form class="form-signin_up" method="post" action="#">       
      <h2 class="form-signin_up-heading">Yeni Hesap Oluştur.</h2>
	  <br></br>
	  <label>Kullanıcı Adı: </label>
      <input type="text" class="form-control" name="name" required="" autofocus="" />
	  <label>Sifre: </label>
      <input type="password" class="form-control" name="password" required="" autofocus="" />
	  <label>Kurum Adı: </label>
      <input type="text" class="form-control" name="affiliation " required="" autofocus="" />
	  <label>Unvan: </label>
      <input type="text" class="form-control" name="title" required="" autofocus="" />
	  <label>Adı/Soyadı: </label>
      <input type="text" class="form-control" name="responsName" required=""/>
	  <label>Email: </label>
	  <input type="email" class="form-control" name="email1" required="" autofocus="" />
	  <label>Ikinci Email: </label>
	  <input type="email" class="form-control" name="email2" required="" autofocus="" />
	  <label>Telefon: </label>
	  <input type="tel" class="form-control" name="phone" required="" autofocus="" />
	  <label>Faks: </label>
	  <input type="tel" class="form-control" name="faks" required="" autofocus="" />
	  <label>Adres: </label>
	  <textarea class="form-control" id="adres" name="address" rows="3"></textarea>
	  <label>Ulke: </label>
      <input type="text" class="form-control" name="ulkeAdi" required=""/>
	  <label>Sehir: </label>
      <input type="text" class="form-control" name="sehir" required=""/>
	  <br></br>
	  <button class="btn btn-lg btn-primary btn-block" type="submit">Kayıt Ol</button>
	  <p></p>
	  <a href="login.php">Giriş Yapın!</a>   
    </form>
  </div>