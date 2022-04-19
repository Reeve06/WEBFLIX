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
            
        
        # Check for an movie_title	:
            if ( empty( $_POST[ 'movie_title' ] ) )
            { $errors[] = 'Enter movie_title	.'; }
        else
            { $movie_title = mysqli_real_escape_string( $link, trim( $_POST['movie_title'] ) ) ; }  
            
        # Check for an category_title	:
            if ( empty( $_POST[ 'release_year' ] ) )
            { $errors[] = 'Enter release year.'; }
        else
            { $release_year = mysqli_real_escape_string( $link, trim( $_POST['release_year'] ) ) ; }  

        # Check for an language	:
            if ( empty( $_POST[ 'language' ] ) )
            { $errors[] = 'Enter language .'; }
        else
            { $language = mysqli_real_escape_string( $link, trim( $_POST['language'] ) ) ; }  
         
            
         # Check for a info:
            if ( empty( $_POST['info'] ) )
            { $errors[] = 'Enter infromation '; }
        else
            { $info = mysqli_real_escape_string( $link, trim( $_POST['info'] ) ) ; }     
            
            
        # Check for a img:
        if ( empty( $_POST['img'] ) )
            { $errors[] = 'Enter img '; }
        else
            { $img = mysqli_real_escape_string( $link, trim( $_POST['img'] ) ) ; }   
            
            
       # Check for an preview	:
        if ( empty( $_POST[ 'preview' ] ) )
            { $errors[] = 'Enter preview	.'; }
        else
            { $preview = mysqli_real_escape_string( $link, trim( $_POST['preview'] ) ) ; }  
                

        # Check for an full_movie	:
            if ( empty( $_POST[ 'full_movie' ] ) )
            { $errors[] = 'Enter full movie	.'; }
        else
            { $full_movie = mysqli_real_escape_string( $link, trim( $_POST['full_movie'] ) ) ; }  
                        
        
            # On success new password into 'users' database table.
        if ( empty( $errors ) ) 
            {
                if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;    
                $sql ="UPDATE movie SET category_title = '$category_title', movie_title = '$movie_title', release_year = '$release_year', language = '$language',
                 info = '$info', img = '$img', preview = '$preview', full_movie = '$full_movie' WHERE id='$id'";
             if ($link->query($sql) === TRUE) {
                   header("Location: admin_movielist.php");
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
