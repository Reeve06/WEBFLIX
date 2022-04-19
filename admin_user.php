<?php # DISPLAY COMPLETE REGISTRATION PAGE.


$page_title = 'User Area ' ;
include('admin_logout.html');
# Access session.
session_start() ;
# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminlogin_tools.php' ) ; load() ; }

# Open database connection.
require ( 'connect_db.php' ) ;

$q = "SELECT * FROM admin WHERE admin_id={$_SESSION[admin_id]}" ;
	$r = mysqli_query( $link, $q ) ;
	if ( mysqli_num_rows( $r ) > 0 )
	{


        echo '
        <div  class="container">
          <div class="row" >
      ';
    
      while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
      {
        echo '
        <div class="col-sm" >
          <div class="alert alert-dark" alert-dismissible fade show" role="alert">
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>	
          <h1>'  . $row['first_name'] . ' '  . $row['last_name'] . '<strong>  </h1> 
          <br>
          <h5  ><strong> User ID : EC2021 '  . $row['admin_id'] . ' </strong></h5>
          <h5><strong> Email : </strong> '  . $row['email'] . ' </h5> 
          <h5><strong> Registration Date : </strong> '  . $row['reg_date'] . ' </h5>
          <!-- Button trigger modal -->
        <button type="button" class="btn btn-link" data-toggle="modal" data-target="#password">
            <i class="fa fa-edit"></i>  Change Password
        </button>
         </div>
        </div></div><br>
        ';
        }
    # Close database connection.
    mysqli_close( $link ) ; 
    }
        else { echo '<h3>No Administrator details.</h3>
    
        ' ; }
    

# Display footer section.
include ( 'footer.html' ) ; 
?>

<div class="modal fade" id="password" tabindex="-1" role="dialog" aria-labelledby="password" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content" >
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalCenterTitle">Change Password</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
<div class="modal-body">
   <form action="adminchange-password.php" method="post">
      <div class="form-group">
       <input type="email"  name="email" 
                 class="form-control"  
                 placeholder="Confirm Email" 				
                value="<?php if (isset($_POST['email'])) echo $_POST['email']; ?>" 
   required>
     </div>
<div class="form-group">
    <input type="password"
                name="pass1" 
	   class="form-control" 
	   placeholder="New Password"
	  value="<?php if (isset($_POST['pass1'])) echo $_POST['pass1']; ?>" 
  required> 
</div>
<div class="form-group">
                <input type="password" 
		  name="pass2" 
		  class="form-control" 
		  placeholder="Confirm New Password"
		  value="<?php if (isset($_POST['pass2'])) echo $_POST['pass2']; ?>" 
  required>
            </div>
</div>
    <div class="modal-footer">
        <div class="form-group">
          <input type="submit" 
    	        name="btnChangePassword" 
        class="btn btn-dark btn-lg btn-block" value="Save Changes"/>
           </div>
         </div>
 </form>
      </div><!--Close body-->
    </div><!--Close modal-body-->
  </div><!-- Close modal-fade-->



    