<?php session_start(); ?>
<?php include "db.php"; ?>
<?php ob_start(); ?>


<?php 
//login php functions

if(isset($_POST['login'])) {

 $username = $_POST['email'];
 $password = $_POST['password'];
 $db_email = $_POST['email'];
  $db_password = $_POST['password'];

 $username = mysqli_real_escape_string($connection, $username);
 $password = mysqli_real_escape_string($connection, $password);

 $query = "SELECT * FROM users WHERE email = '{$username}'";
 $select_user_query = mysqli_query($connection,$query);
 if(!$select_user_query) {
   die("QUERY FAILED". mysqli_error($connection));
 }

 while($row = mysqli_fetch_array($select_user_query)) {

   $db_id = $row['id'];
   $db_email = $row['email'];
   $db_password = $row['password'];

 }

 //login username and email verification section 
if($username !== $db_email && $password !== $db_password) {
  
 echo "<script type='text/javascript'>document.location = 'login.php'; </script>";
 
 
} else if ($username == $db_email && $password == $db_password) {
  echo "<script type='text/javascript'>document.location = 'index.html'; </script>";
} else {
  "<script type='text/javascript'>document.location = 'login.php'; </script>";
}



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

<!-- Website Favicon --> 
<link rel="shortcut icon" href="img/favicon.jpg" type="img/jpg"/>

<!-- login page navigation -->

</head>
<body>

  <div class="navigation">
    <input type="checkbox" class="navigation__checkbox" id="navi-toggle">

    <label for="navi-toggle" class="navigation__button">
      <span class="navigation__icon"><img src="img/logo3.png" alt="logo" class="logo"></span>
      
    </label>
    
    

    <nav class="navigation__nav">
      <ul class="navigation__list">
        <li class="navigation__item"><a href="index.html" class="navigation__link">Home</a></li>
        <li class="navigation__item"><a href="form.php" class="navigation__link">Sign up</a></li>
        <li class="navigation__item"><a href="store.html" class="navigation__link">Store</a></li>        
        <li class="navigation__item"><a href="logout.php" class="navigation__link">Log Out</a></li>
      </ul>
    </nav>
  
  </div>



<!-- login form -->

 <div class="Sign-up-form">
    <img src="img/account.jpg" alt="account" class="account">
    <h1>LOGIN</h1>
  <form action="login.php" method="POST">
    <input type="email" class="input-box" name="email" placeholder="Your Email">
    
    <input type="password" class="input-box" name="password" placeholder="Password">
  
    <p><span><input type="checkbox" name="terms"></span>I agree to the terms of services</p>
  
    
    <button type="login" name="login" class="login-btn">Login</button>
    <hr>
    <p class="or">OR</p>
    <a href="form.php" name="login">Create account?</a>
    
   
   
   </form>
  </div>




</body>

</html>
