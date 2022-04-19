
<?php # DISPLAY COMPLETE LOGGED IN PAGE.


# Access session.
session_start() ;

# Open database connection.
require ( 'connect_db.php' ) ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminlogin_tools.php' ) ; load() ; }

# Get passed product id and assign it to a variable.
if ( isset( $_GET['user_id'] ) ) $user_id = $_GET['user_id'] ;


include ( 'admin_logout.html' ) ;


# Set page title and display header section.
$page_title = 'Useredit ' ;
echo '<div class="container">
        <h1 class="text-center">Users Edit </h1>
  <hr color="#dc3545;"> 
<br>
            <div class="row">
    	<div class="col-sm">';



# Retrieve selective item data from 'user' database table
$q = "SELECT * FROM users WHERE user_id = $user_id" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) == 1 )
	{
	
	
		while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
		{
		echo '
	
		<div class="alert alert-secondary" alert-dismissible fade show" role="alert">
		 
			<h1>Edit User</h1>
	  <br>	
	  <form method="POST" action="update_user.php?user_id='.$row['user_id'].'">
	  	<h5  ><strong> User ID : EC2021 '  . $row['user_id'] . ' </strong></h5>	
		<h5><strong><label>Firstname:</label></strong><input type="text" value="'  . $row['first_name'] . '" name="first_name"></h5>
		<h5><strong><label>Lastname:</label></strong><input type="text" value="'  . $row['last_name'] . '" name="last_name"></h5>
		<h5><strong><label> Date of birth : </label></strong><input type="text" value=" '  . $row['date_birth'] . '" name="date_birth"> </h5>
		<h5><strong><label> Email : </label></strong><input type="text" value=" '  . $row['email'] . '" name="email"> </h5>
		<h5><strong><label> Contact Number : </label></strong><input type="text" value=" '  . $row['contact_number'] . '" name="contact_number"> </h5>
		<h5><strong><label> Country : </label></strong><input type="text" value=" '  . $row['country'] . '" name="country"> </h5>
		<h5><strong> Join Date : </strong> '  . $row['reg_date'] . ' </h5>
	
	
		<input type="submit" name="submit">
		<a href="admin_userlist.php">Back</a>	
		</form>
		
		</div>
		</div></div>
				

		
		
		<br>
		' ;
		}
	
	# Close database connection.
	mysqli_close( $link ) ; 
	}
	else { echo '<div class="alert alert-danger" alert-dismissible fade show" role="alert">
			<button type="button" class="close" data-dismiss="alert" aria-label="Close">
				<span aria-hidden="true">&times;</span>
			</button>
				<h1>uere status</h1>
				<h3>No user to edit.</h3>
			</div></div></div><br>
			
	' ; }
	
	# Display footer section.
	include ( 'footer.html' ) ; 
	?>
	


	