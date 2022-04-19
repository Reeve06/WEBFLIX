<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminlogin_tools.php' ) ; load() ; }

# Check form submitted.
if ( $_SERVER[ 'REQUEST_METHOD' ] == 'POST' )

{
    # Connect to the database.
    require ('connect_db.php');
  
    # Initialize an error array.
  $errors = array();
  
    # Check for a first_name:
        if ( empty( $_POST[ 'first_name' ] ) )
            { $errors[] = 'Enter your First Name.'; }
        else
            { $first_name = mysqli_real_escape_string( $link, trim( $_POST[ 'first_name' ] ) ) ; }        

   # Check for an last_name:
    if ( empty( $_POST[ 'last_name' ] ) )
    { $errors[] = 'Enter your last name.'; }
    else
    { $last_name = mysqli_real_escape_string( $link, trim( $_POST[ 'last_name' ] ) ) ; }        
            

       # Check for an date_birth:
        if ( empty( $_POST[ 'date_birth' ] ) )
        { $errors[] = 'Enter your last name.'; }
        else
        { $date_birth = mysqli_real_escape_string( $link, trim( $_POST[ 'date_birth' ] ) ) ; } 

           # Check for an email:
    if ( empty( $_POST[ 'email' ] ) )
    { $errors[] = 'Enter your last name.'; }
    else
    { $email = mysqli_real_escape_string( $link, trim( $_POST[ 'email' ] ) ) ; } 

       # Check for an contact_number:
        if ( empty( $_POST[ 'contact_number' ] ) )
        { $errors[] = 'Enter your last name.'; }
        else
        { $contact_number = mysqli_real_escape_string( $link, trim( $_POST[ 'contact_number' ] ) ) ; } 

           # Check for an country:
    if ( empty( $_POST[ 'country' ] ) )
    { $errors[] = 'Enter your last name.'; }
    else
    { $country = mysqli_real_escape_string( $link, trim( $_POST[ 'country' ] ) ) ; } 


      # On success new password into 'users' database table.
      if ( empty( $errors ) ) 
      {
          if ( isset( $_GET['user_id'] ) ) $user_id = $_GET['user_id'] ;    
          $sql ="UPDATE users SET first_name = '$first_name', last_name = '$last_name' , 
          date_birth = '$date_birth', email = '$email', contact_number = '$contact_number', country = '$country' WHERE user_id='$user_id'";
       if ($link->query($sql) === TRUE) {
             header("Location: admin_userlist.php");
          } else {
              echo "Error deleting record: " . $link->error;
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

