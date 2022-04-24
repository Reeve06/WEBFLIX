<?php # DISPLAY COMPLETE LOGGED IN PAGE.


    # Access session.
    session_start() ;

    # Redirect if not logged in.
    if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

  
    # Set page title and display header section.
    $page_title = 'about us' ;
    include ( 'logout.html' ) ;

    echo '<div class="container">
    <br>
			<h1 class="text-center"> About WEBFLIX</h1>
    <hr color="#dc3545;">
    </div>';
   
# Open database connection.
require ( 'connect_db.php' ) ;

# Retrieve about  from 'about_us' database table.
$q = "SELECT * FROM about_us" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{

    # Display body section.
    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
    {
    echo '
    <br>

<div class="card mb-3" style="max-width: 540px;">
  <div class="row no-gutters">
    <div class="col-md-4">
    <img src='. $row['img'].' class="card-img-top" alt="about" > 
    </div>
    <div class="col-md-8">
      <div class="card-body">
      <h3 class="card-title">'. $row['title'].'</h3>
      <hr color="#A7A9BE";>
      <h6 class="card-title">'. $row['info'].'</h6>
      </div>
    </div>
  </div>
</div>



<br>
	
';
 
}

# Close database connection.
mysqli_close( $link) ; 
}

# Or display message.
else { echo '<h5>There is no about us.</h5>' ; }


# Display footer section.
include ( 'footer.html' ) ;

?>
