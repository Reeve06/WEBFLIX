
<?php # DISPLAY COMPLETE LOGGED IN PAGE.

# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

include ( 'logout.html' ) ;
   
# Open database connection.
require ( 'connect_db.php' ) ;

# Retrieve items from 'subscription' database table.
$q = "SELECT * FROM subscription WHERE user_id={$_SESSION[user_id]}
ORDER BY subscription_date DESC" ;

$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{


    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '
    <div>
    <br>
	<ul class="list-group list-group-flush">
	        <li class="list-group-item">
                <div class="form-group row">
                <label for="subscription ref" class="col-sm-12 col-form-label">
                subscription Reference:  #EC1000' . $row['subscription_id'] . '</label> 
                </div>
            </li>
            <li class="list-group-item">
                <div class="form-group row">
                <label for="subscription ref" class="col-sm-12 col-form-label">
                Total Paid:   &pound ' . $row['total'] . ' 
                </label>
                </div>
            </li>          
            <li class="list-group-item">
                <div class="form-group row">
                <label for="subscription ref" class="col-sm-12 col-form-label">
                <small>'  . $row['subscription_date'] . '</small>
                </label>
                </div>
            </li>
    </ul>
</div>
<br>			
';
  }

  # Close database connection.
  mysqli_close( $link) ; 
}

    else { echo '<div class="container">
      <br>
      <div class="alert alert-secondary" role="alert">
      <h5 color="#FF8906">There are currently no subscription done.</h5>
      </div>
      </div> </div>  <br>' ; }

include('footer.html');
?>
    