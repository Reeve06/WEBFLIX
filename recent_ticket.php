
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
ORDER BY subscription_date DESC
LIMIT 1" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{

    echo '
    <br>
    <div class="container">
<div class="card bg-light mb-3">
	     <div class="row no-gutters">
	         <div class="col-md-4">
		<img width="256" class="img-fluid" alt="QR Code " src="img/qrcode.png">
	         </div>
	         <div class="col-md-8">
	         <div class="card-body">
	';


    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
    echo '
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
          </ul>
    <hr>
<div class="card-footer">
   <small>'  . $row['subscription_date'] . '</small>
</div>
</div>
</div>	</div></div></div> <br>		
';
  }

  # Close database connection.
  mysqli_close( $link ) ; 
}

include('footer.html');
?>
    
