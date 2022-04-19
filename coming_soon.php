<?php # DISPLAY COMPLETE LOGGED IN PAGE.


    # Access session.
    session_start() ;

  
    # Set page title and display header section.
    $page_title = 'Upcoming Programs' ;
    include ( 'logout.html' ) ;
    echo '<div class="container">
			<h1 class="text-center">Upcomig Programs</h1>
      <br>
				<div class="row">';

    # Open database connection.
    require ( 'connect_db.php' ) ;

    # Retrieve movies from 'movie' database table.
    $q = "SELECT * FROM coming_soon" ;
    $r = mysqli_query( $link, $q ) ;
    if ( mysqli_num_rows( $r ) > 0 )
    {

        # Display body section.
        while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
        {
          echo '  
  
              
          <div class="col-md-3 d-flex justify-content-center">
          <div class=" card card-group text-center">
    <div class="card">
    <img src='. $row['img'].' class="card-img-top" alt="programs"  style="hight: 30px;">  
      <div class="card-body">
      <h6 class="card-title">'. $row['title'].'</h6>
       
      </div>  
      </div>
      </div>
    
       </div><! -- closing row -->
     <br >
     <br>
     
     
     ';

    }

    # Close database connection.
    mysqli_close( $link) ; 
}

# Or display message.
else { echo '<p>There are currently no movies showing.</p>' ; }


echo '<br><br><br>';
# Display footer section.
include ( 'footer.html' ) ;

?>

