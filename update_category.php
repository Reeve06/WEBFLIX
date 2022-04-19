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

              
        # Check for an category_title	:
        if ( empty( $_POST[ 'category_title' ] ) )
            { $errors[] = 'Enter category title	.'; }
        else
            { $category_title = mysqli_real_escape_string( $link, trim( $_POST['category_title'] ) ) ; }  
            
            
        # Check for a info:
        if ( empty( $_POST['info'] ) )
            { $errors[] = 'Enter infromation on category'; }
        else
            { $info = mysqli_real_escape_string( $link, trim( $_POST['info'] ) ) ; }     

        
            # On success new password into 'users' database table.
        if ( empty( $errors ) ) 
            {
                if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;    
                $sql ="UPDATE category SET category_title = '$category_title', info = '$info' WHERE id='$id'";
             if ($link->query($sql) === TRUE) {
                   header("Location: admin_categorylist.php");
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
