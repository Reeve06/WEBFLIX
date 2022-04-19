<?php # DISPLAY COMPLETE LOGGED IN PAGE.


    # Access session.
    session_start() ;

    # Redirect if not logged in.
    if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

  
    # Set page title and display header section.
    $page_title = 'subscription' ;
    include ( 'logout.html' ) ;
    echo '<div class="container">
			<h1 class="text-center">subscription</h1>
<hr color="#dc3545;">
 <h3>Note: If you already have an subscription plan active and any new purchases made on new subscription will be added to your old plan</h3>
 <br>  
				<div class="row">
       
        ';
        

    # Open database connection.
    require ( 'connect_db.php' ) ;

    # Retrieve plans from 'plans' database table.
    $q = "SELECT * FROM plans" ;
    $r = mysqli_query( $link, $q ) ;
    if ( mysqli_num_rows( $r ) > 0 )
    {

        # Display body section.
        while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
        {
        echo '

   
        <br> <br>
<div class="col-sm-6">
    <div class="card">
    <img hight="400px" src='. $row['img'].' class="card-img-top" alt="plan">
      <div class="card-body justify-content-center">
        <h6 class="card-title">'. $row['plans_title'].'</h6>
        <small class="text-muted"><a  href="subscription.php?id='.$row['id'].'" class="btn btn-primary justify-content-center">subscribe Now</a></small>
      </div>
    </div>
   
    <br> <br> <br> <br> 
     </div><! -- closing row -->
  
   <br> <br> <br> <br>  <br> <br> <br> <br> 

	  ';

    

        }

        # Close database connection.
        mysqli_close( $link) ; 
    }

    # Or display message.
    else { echo '<p>There are currently no subscription done.</p>' ; }

 

    # Display footer section.
    include ( 'footer.html' ) ;

?>
