
<?php # DISPLAY COMPLETE LOGIN PAGE.

# Access session.
session_start() ;

# Include HTML static file login.html
include ( 'login.html' ) ;

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )

{
    # Connect to the database.
    require ('connect_db.php');
  
    # Initialize an error array.
  $errors = array();

  # Check for an email address:
    if ( empty( $_POST[ 'email' ] ) )
    { $errors[] = 'Enter your email address.'; }
    else
    { $e = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; }
  
    # Check for a password and matching input passwords.
  if ( !empty($_POST[ 'pass1' ] ) )
  {
    if ( $_POST[ 'pass1' ] != $_POST[ 'pass2' ] )
    { $errors[] = 'Passwords do not match.' ; }
    else
    { $p = mysqli_real_escape_string( $link, trim( $_POST[ 'pass1' ] ) ) ; }
  }
  else { $errors[] = 'Enter your password.' ; }

  # Check if email address already registered.
  if ( empty( $errors ) )
  {
    $q = "SELECT * FROM admin WHERE email='$e'" ;
    $r = @mysqli_query ( $link, $q ) ;
    }

    # On success new password into 'admin' database table.
  if ( empty( $errors ) ) 
  {
    $q = "UPDATE admin SET pass= SHA2('$p',256) WHERE  email='$e'";
    $r = @mysqli_query ( $link, $q ) ;
    if ($r)
    {

      
       echo '  
       <div class="container"><div class="alert alert-dark alert-dismissible fade show">
	<h1><strong>Password successfully changed!</strong></h1>
  <a href="admin_login.php">LOG-IN</a>
  </div></div>
       ';
      
    } else {
        echo "Error updating record: " . $link->error;
    }

    # Close database connection.
    
	mysqli_close($link); 
    exit();
  }

  # Or report errors.
  else 
  {  
    echo ' <div class="container"><div class="alert alert-dark alert-dismissible fade show">
    <button type="button" class="close" data-dismiss="alert">&times;</button>
	<h1><strong>Error!</strong></h1><p>The following error(s) occurred:<br>' ;
    foreach ( $errors as $msg )
    { echo " - $msg<br>" ; }
    echo 'Please try again.</div></div>';
    # Close database connection.
    mysqli_close( $link );
  }  
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
<h1 class="pb-3">Forget Password </h1>
<div class="form-style">
  
<form  action="admin_forget_password.php" method="post">
   

  <div class="form-group pb-3">   
  <input type="email" placeholder="Comfirm email" name="email" class="form-control" id="exampleInputEmail1"  value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>">     
  </div>

  <div class="form-group pb-3"> 
  <input type="password"  placeholder="New Password" class="form-control" id="exampleInputPassword1" name="pass1"  value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1'];?>">  
  </div>
  
  <div class="form-group pb-3"> 
  <input type="password" placeholder="Confirm New Password" class="form-control" id="exampleInputPassword2" name="pass2"  value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2'];?>">    
  </div>


   <div class="pb-2">
  <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2"  value="forgetpassword">Change Password</button>
   </div>
 
</form>
 

</div>
</div>
</div>
<br>



<?php 
# Display footer section.
include ( 'footer.html' ) ;
?>
