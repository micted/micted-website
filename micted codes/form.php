
<?php include "db.php";?>
<?php ob_start(); ?>
 
<?php

//sign up functions 

if(isset($_POST['submit'])) {

$username = filter_var($_POST['email'], FILTER_SANITIZE_STRING);
$password = filter_var($_POST['password'], FILTER_SANITIZE_STRING);

//form input box validation

if(!empty($username) && !empty($password)) {



  $connection = mysqli_connect('localhost', 'root', '','useraccounts');

echo "<script type='text/javascript'>document.location = 'thank you.php'; </script>";



$username = mysqli_real_escape_string($connection, $username);
$password = mysqli_real_escape_string($connection, $password);

//query from database

  $query = "INSERT INTO  users(email,password)";
  $query .= "VALUES ('$username', '$password')";
  $result = mysqli_query($connection, $query);

  if(!$result) {

     die("QUERY FAILED" .mysqli_error($connection) . '' . mysqli_error($query));

    }
   
//randSalt section or password encryption

 $query = "SELECT randSalt FROM users";
 $select_randsalt_query = mysqli_query($connection, $query);
 
if(!select_randsalt_query) {

  die("Query Failed" . mysqli_error($connection));
 }
 $row = mysqli_fetch_array($select_randsalt_query);
 $salt = $row['randsalt'];
 $password = crypt($password, $salt);



} else {
 $message = "fields can not be empty!";
  
}
 

} else {
  $message="";
}


?>






<!DOCTYPE html>
<html lang="En">
<head>
<title>Sign up Form</title>
<meta charset="UTF-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" 
content="width=device-width,initial-scale=1.0">
<link rel="stylesheet" href="css/sign up.css">
<link rel="stylesheet" href="css/error.css">

<!-- Website Favicon --> 
<link rel="shortcut icon" href="img/favicon.jpg" type="img/jpg"/>



</head>
<body>

<!-- navigation section -->   
  <div class="navigation">
    <input type="checkbox" class="navigation__checkbox" id="navi-toggle">

    <label for="navi-toggle" class="navigation__button">
      <span class="navigation__icon"><img src="img/logo3.png" alt="logo" class="logo"></span>
      
    </label>
    
    

    <nav class="navigation__nav">
      <ul class="navigation__list">
        <li class="navigation__item"><a href="index.html" class="navigation__link">Home</a></li>
        <li class="navigation__item"><a href="login.php" class="navigation__link">Login</a></li>
        <li class="navigation__item"><a href="store.html" class="navigation__link">Store</a></li>      
      <li class="navigation__item"><a href="logout.php" class="navigation__link">Log Out</a></li>
      </ul>
    </nav>
  
  </div>

 <!-- alert(echo) error message -->
 
  <div class="text-center">
    <h2><?php echo $message; ?></h2>
    </div>


 <!-- sign up form -->

 <div class="Sign-up-form">
    <img src="img/account.jpg" alt="account" class="account">
    <h1>Sign up Now</h1>
  <form action="form.php" method="POST">
    <input type="email" class="input-box" name="email" value="<?php if(isset($_POST['email'])) echo $_POST['email']; ?>" placeholder="Your Email">
    
    <input type="password" class="input-box" name="password" placeholder="Password" value="<?php if(isset($_POST['password'])) echo $_POST['password']; ?>">
  
    <p><span><input type="checkbox" name="terms"></span>I agree to the terms of services</p>
  
    <button class="signup-btn" type="submit" name="submit"
    >Sign up</button>

    <!-- or section -->
    
    <hr>
    <p class="or">OR</p>
    <a href="login.php" name="login">Have an account-login?</a>
    
   
   </form>
  </div>




</body>

</html>
