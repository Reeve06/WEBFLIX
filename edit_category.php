
<?php # DISPLAY COMPLETE LOGGED IN PAGE.


# Access session.
session_start() ;

# Open database connection.
require ( 'connect_db.php' ) ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminlogin_tools.php' ) ; load() ; }

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;


include ( 'admin_logout.html' ) ;


# Set page title and display header section.
$page_title = 'categoryedit ' ;
echo '<div class="container">
        <h1 class="text-center">Category Edit </h1>
  <hr color="#dc3545;"> 
<br> 
            <div class="row">
    	<div class="col-sm">
       
        ';



# Retrieve selective item data from 'category' database table
$q = "SELECT * FROM category WHERE id = $id";
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) == 1 )
	{
	
	
		while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
		{
		echo '
	

		<div class="alert alert-secondary" alert-dismissible fade show" role="alert">
		 
			<h1>Edit User</h1>
	  <br>	
	  <form method="POST" action="update_category.php?id='.$row['id'].'">
	  	<h5  ><strong> Category ID : '  . $row['id'] . ' </strong></h5>	
		<h5><strong><label>Category Title:</label></strong><input type="text" value="'  . $row['category_title'] . '" name="category_title"></h5>
		<h5><strong><label>Category information:</label></strong><input type="text" value="'  . $row['info'] . '" name="info"></h5>
			
		<input type="submit" name="submit">
		<a href="admin_categorylist.php">Back</a>	
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
				<h3>No Category to edit.</h3>
			</div></div></div><br>
			
	' ; }
	
	# Display footer section.
	include ( 'footer.html' ) ; 
	?>
	

