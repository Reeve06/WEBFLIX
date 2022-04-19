
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

     # Check for a Date of birth.
    if (empty($_POST['date_birth']))
    {
        $errors[] = 'Enter your date of birth.';
    }
    else
    {
        $dob = mysqli_real_escape_string($link, trim($_POST['date_birth']));
    }

    # Check for a Contact Number.
    if (empty($_POST['contact_number']))
    {
        $errors[] = 'Enter your Contact Number.';
    }
    else
    {
        $contact_no = mysqli_real_escape_string($link, trim($_POST['contact_number']));
    }


    # Check for a Country.
    if (empty($_POST['country']))
    {
        $errors[] = 'Enter your Country.';
    }
    else
    {
        $count = mysqli_real_escape_string($link, trim($_POST['country']));
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

    # Check for a card number.
        if (empty($_POST['card_number']))
        {
            $errors[] = 'Enter your Card Number.';
        }
        else
        {
            $card_no = mysqli_real_escape_string($link, trim($_POST['card_number']));
        }

        # Check for a card exp month.    
        if (empty($_POST['exp_month']))
        {
            $errors[] = 'Enter your Card Exp Month.';
        }
        else
        {
            $exp_m = mysqli_real_escape_string($link, trim($_POST['exp_month']));
        }

        # Check for a card exp year.
        if (empty($_POST['exp_year']))
        {
            $errors[] = 'Enter your Card Exp Year.';
        }
        else
        {
            $exp_y = mysqli_real_escape_string($link, trim($_POST['exp_year']));
        }

        # Check for a card cvv.
        if (empty($_POST['cvv']))
        {
            $errors[] = 'Enter your Card CVV.';
        }
        else
        {
            $cvv = mysqli_real_escape_string($link, trim($_POST['cvv']));
        }

# Check if email address already registered.
if ( empty( $errors ) )
{
  $q = "SELECT user_id FROM users WHERE email='$email'" ;
  $r = @mysqli_query ( $link, $q ) ;
  if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'Email address already registered. <a href="login.php">Login</a>' ;
}

# On success register user inserting into 'users' database table.
if ( empty( $errors ) ) 
{
  $q = "INSERT INTO users (first_name, last_name, date_birth, contact_number, country, email, pass, card_number, exp_month, exp_year, cvv, reg_date) VALUES ('$fn', '$ln', '$dob', '$contact_no', '$count', '$email', SHA2('$p',256), '$card_no', '$exp_m', '$exp_y', '$cvv', NOW() )";
  $r = @mysqli_query ( $link, $q ) ;
  if ($r)
  { echo '
    <div class="col-sm-12 col-md-4">
    <h1>Registered!</h1><p>You are now registered with Trail access.</p><p><a href="login.php">Login</a></p>
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
  
<form  action="register.php" method="post">
   
  <div class="form-group pb-3">   
  <input type="text" placeholder="First Name"class="form-control" id="exampleInputName" name="first_name" value="<?php if (isset($_POST['first_name'])) echo $_POST['first_name'];?>"> 
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="Last Name" class="form-control" id="exampleInputName" name="last_name"  value="<?php if (isset($_POST['last_name'])) echo $_POST['last_name'];?>">
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="Birth Date" class="form-control" id="exampleInputName" name="date_birth"  value="<?php if (isset($_POST['dob'])) echo $_POST['dob'];?>">
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="Contact Number" class="form-control" id="exampleInputName" name="contact_number"  value="<?php if (isset($_POST['contact_no'])) echo $_POST['contact_no'];?>">
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="Country" class="form-control" id="exampleInputName" name="country"  value="<?php if (isset($_POST['count'])) echo $_POST['count'];?>">
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
    The Account will be registered with Trail access!
    </div>

 
  <div class="pt-4 text-center">  
     The Card details will be save on the account and if you choose to futher access the Premium content, you can stream them by
     subscribing for monthly or yearly plans. 
   </div>
<br>
  <div class="form-group pb-3"> 
  <input type="text" placeholder="Card Number" class="form-control" id="exampleInputCard1" name="card_number"  value="<?php if (isset($_POST['card_no'])) echo $_POST['card_no']; ?>">    
  </div>


  <div class="form-group pb-3"> 
  <input type="text" placeholder=" Expiration Month" class="form-control" id="exampleInputExp1" name="exp_month" size="2" value="<?php if (isset($_POST['exp_m'])) echo $_POST['exp_m']; ?>">
  <input type="text" placeholder=" Expiration Year" class="form-control" id="exampleInputExp1" name="exp_year" size="2" value="<?php if (isset($_POST['exp_y'])) echo $_POST['exp_y']; ?>">      
  </div>

  <div class="form-group pb-3"> 
  <input type="text" placeholder="CVV" class="form-control" id="exampleInputCVV1" name="cvv" size="3" value="<?php if (isset($_POST['cvv'])) echo $_POST['cvv']; ?>">    
  </div>

   <div class="pb-2">
  <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2"  value="Register">Submit</button>
   </div>
 
</form>
  <div class="sideline">OR</div>
 
  <div class="pt-4 text-center">
  already have an account. <a href="login.php">Sign in</a>
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



 
