

<?php # DISPLAY COMPLETE LOGIN PAGE.

# Include HTML static file login.html
include ( 'login.html' ) ;

# Display any error messages if present.
if ( isset( $errors ) && !empty( $errors ) )
{
 echo '<h5 id="err_msg">Oops! There was a problem:<br></h5>' ;
 foreach ( $errors as $msg ) { echo " - $msg<br>" ; }
 echo '<h5>Please try again or <a href="admin_register.php">Register as administrator </a></h5>' ;
}
?>
<!doctype html>
<html lang="en-GB">
<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   <link rel="stylesheet" href="mystyle.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/bb3ef965c3.js" crossorigin="anonymous"></script> 
   <script src="https://use.fontawesome.com/f59bcd8580.js"></script>
</head>
<body>



<div class="container-covReg">
<div class="row m-5 no-gutters shadow-lg">
<div class="col-md-6 d-none d-md-block">
<img src="img/cover.jpg" class="img-fluid" style="min-height:100%;" />
</div>
<div class="col-md-6 bg-white p-5">
<h1 class="pb-3">Administrator Login </h1>
<div class="form-style">
  
<form  action="adminlogin_action.php" method="post">
   
  <div class="form-group pb-3">   
  
    <input type="email" placeholder="Email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" name="email"> 
    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small> 

  </div>
  <div class="form-group pb-3">   
    <input type="password" placeholder="Password" class="form-control" id="exampleInputPassword1"  name="pass">
  </div>
  <div class="d-flex align-items-center justify-content-between">
  <div><a href="admin_forget_password.php">Forget Password?</a></div>
</div>
   <div class="pb-2">
  <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2"  value="Login">Submit</button>
   </div>
 
</form>
  <div class="sideline">OR</div>
 
  <div class="pt-4 text-center">
  Register as administrator. <a href="admin_register.php">Sign Up</a>
  </div>
</div>

</div>
</div>
</div>



<?php 
# Display footer section.
include ( 'footer.html' ) ;
?>