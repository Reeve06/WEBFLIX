
<?php # DISPLAY COMPLETE LOGGED IN PAGE.


# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminlogin_tools.php' ) ; load() ; }


# Set page title and display header section.
$page_title = 'User list ' ;
include ( 'admin_logout.html' ) ;
echo '<div class="container">
        <h1 class="text-center">Users List </h1>
  <hr color="#dc3545;"> 
<br>
            <div class="row">
    ';

# Open database connection.
require ( 'connect_db.php' ) ;


# Retrieve items from 'users' database table.
$q = "SELECT * FROM users" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
    echo '<div class="col-sm">';

    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
    {
    echo '

    <div class="alert alert-secondary" alert-dismissible fade show" role="alert">
     
        <h1>User</h1>
  <br>
    <h5  ><strong> User ID : EC2021 '  . $row['user_id'] . ' </strong></h5>    
    <h5><strong> User Name: </strong> '  . $row['first_name'] . '  '  . $row['last_name'] . ' </h5>
    <h5><strong> Date of birth : </strong> '  . $row['date_birth'] . ' </h5>
    <h5><strong> Email : </strong> '  . $row['email'] . ' </h5>
    <h5><strong> Contact Number : </strong> '  . $row['contact_number'] . ' </h5>
    <h5><strong> Country : </strong> '  . $row['country'] . ' </h5>
    <h5><strong> Join Date : </strong> '  . $row['reg_date'] . ' </h5>


    <button type="button" class="btn btn-outline-success"> <a href="edit_user.php?user_id='.$row['user_id'].'">Edit</a></button>
    <button type="button" class="btn btn-outline-danger"> <a href="delete_user.php?user_id='.$row['user_id'].'">Delete</a></button>


   


    </div>
    <br>
    ' ;
    }

# Close database connection.
mysqli_close( $link ) ; 
}
else { echo ' <div class="alert alert-secondary" alert-dismissible fade show" role="alert">
       
  
            <h1>users status</h1>
            <h3>No users</h3>
       </div></div>
      <br>
        
' ; }

# Display footer section.
include ( 'footer.html' ) ; 
?>
