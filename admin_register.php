
<?php

# Include HTML static file login.html
include ( 'login.html' ) ;


# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    # Connect to the database.
    require ('connect_db.php');
    # Initialize an error array.
    $errors = array();
    # Check for a first name.
    if (empty($_POST['first_name']))
    {
        $errors[] = 'Enter your first name.';
    }
    else
    {
        $fn = mysqli_real_escape_string($link, trim($_POST['first_name']));
    }
    # Check for a second name.
    if (empty($_POST['last_name']))
    {
        $errors[] = 'Enter your last name.';
    }
    else
    {
        $ln = mysqli_real_escape_string($link, trim($_POST['last_name']));
    }

     # Check for a email.
    if (empty($_POST['email']))
    {
        $errors[] = 'Enter your Email.';
    }
    else
    {
        $email = mysqli_real_escape_string($link, trim($_POST['email']));
    }


# Check for a password and matching input passwords.
    if (!empty($_POST['pass1']))
    {
            if ($_POST['pass1'] != $_POST['pass2'])
        {
            $errors[] = 'Passwords do not match.';
        }
        else
        {
            $p = mysqli_real_escape_string($link, trim($_POST['pass1']));
        }
        }
        else
        {
            $errors[] = 'Enter your password.';
     }

   

# Check if email address already registered.
if ( empty( $errors ) )
{
  $q = "SELECT admin_id FROM admin WHERE email='$email'" ;
  $r = @mysqli_query ( $link, $q ) ;
  if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a href="admin_login.php">Login</a>' ;
}

# On success register user inserting into 'admin' database table.
if ( empty( $errors ) ) 
{
  $q = "INSERT INTO admin (first_name, last_name, email, pass,  reg_date) VALUES ('$fn', '$ln', '$email', SHA2('$p',256),  NOW() )";
  $r = @mysqli_query ( $link, $q ) ;
  if ($r)
  { echo '
    <div class="col-sm-12 col-md-4">
    <h1>Registered!</h1><p>You are now registered as Admin.</p><p><a href="admin_login.php">Login</a></p>
    <br>
    </div>' ; }

  # Close database connection.
  mysqli_close($link); 
  exit();
}

# Or report errors.
else 
{
  echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
  foreach ( $errors as $msg )
  { echo " - $msg<br>" ; }
  echo 'Please try again.</p>';
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
<h1 class="pb-3">Register </h1>
<div class="form-style">
  
<form  action="admin_register.php" method="post">
   
  <div class="form-group pb-3">   
  <input type="text" placeholder="First Name"class="form-control" id="exampleInputName" name="first_name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name'];?>"> 
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="Last Name" class="form-control" id="exampleInputName" name="last_name"  value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name'];?>">
  </div>

  <div class="form-group pb-3">   
  <input type="email" placeholder="email" name="email" class="form-control" id="exampleInputEmail1"  value="<?php if (isset($_POST['email'])) echo $_POST['email'];?>">     
  </div>

  <div class="form-group pb-3"> 
  <input type="password"  placeholder="Password" class="form-control" id="exampleInputPassword1" name="pass1"  value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1'];?>">  
  </div>
  
  <div class="form-group pb-3"> 
  <input type="password" placeholder="Confirm Password" class="form-control" id="exampleInputPassword2" name="pass2"  value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2'];?>">    
  </div>

  <div class="sideline">  
    The Account will be registered as Administrator!
    </div>

 
   <div class="pb-2">
  <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2"  value="Register">Submit</button>
   </div>
 
</form>
  <div class="sideline">OR</div>
 
  <div class="pt-4 text-center">
  already have an account. <a href="admin_login.php">Sign in</a>
  </div>
</div>

</div>
</div>
</div>
<br>



<?php 
# Display footer section.
include ( 'footer.html' ) ;
?>

