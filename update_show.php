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
            
        
        # Check for an show_title	:
            if ( empty( $_POST[ 'show_title' ] ) )
            { $errors[] = 'Enter show_title	.'; }
        else
            { $show_title = mysqli_real_escape_string( $link, trim( $_POST['show_title'] ) ) ; }  
            
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

        # Check for an season	:
            if ( empty( $_POST[ 'season' ] ) )
            { $errors[] = 'Enter season .'; }
           else
            { $season = mysqli_real_escape_string( $link, trim( $_POST['season'] ) ) ; }              
         
            
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
                

        # Check for an ep1	:
            if ( empty( $_POST[ 'ep1' ] ) )
            { $errors[] = 'Enter Episodes 1	.'; }
        else
            { $ep1 = mysqli_real_escape_string( $link, trim( $_POST['ep1'] ) ) ; }  

       # Check for an ep2	:
        if ( empty( $_POST[ 'ep2' ] ) )
        { $errors[] = 'Enter Episodes 2	.'; }
    else
        { $ep2 = mysqli_real_escape_string( $link, trim( $_POST['ep2'] ) ) ; }  

       # Check for an ep3	:
        if ( empty( $_POST[ 'ep3' ] ) )
        { $errors[] = 'Enter Episodes 3	.'; }
    else
        { $ep3 = mysqli_real_escape_string( $link, trim( $_POST['ep3'] ) ) ; } 

       # Check for an ep4:
        if ( empty( $_POST[ 'ep4' ] ) )
        { $errors[] = 'Enter Episodes 4	.'; }
    else
        { $ep4 = mysqli_real_escape_string( $link, trim( $_POST['ep4'] ) ) ; }  

       # Check for an ep5	:
        if ( empty( $_POST[ 'ep5' ] ) )
        { $errors[] = 'Enter Episodes 5	.'; }
    else
        { $ep5 = mysqli_real_escape_string( $link, trim( $_POST['ep5'] ) ) ; }  
        
        
       # Check for an ep6	:
        if ( empty( $_POST[ 'ep6' ] ) )
        { $errors[] = 'Enter Episodes 6	.'; }
    else
        { $ep6 = mysqli_real_escape_string( $link, trim( $_POST['ep6'] ) ) ; }  
        
        
       # Check for an ep1	:
        if ( empty( $_POST[ 'ep7' ] ) )
        { $errors[] = 'Enter Episodes 7	.'; }
    else
        { $ep7 = mysqli_real_escape_string( $link, trim( $_POST['ep7'] ) ) ; }  
        
        
        # Check for an ep1	:
            if ( empty( $_POST[ 'ep8' ] ) )
            { $errors[] = 'Enter Episodes 8	.'; }
        else
            { $ep8 = mysqli_real_escape_string( $link, trim( $_POST['ep8'] ) ) ; }  
            
       # Check for an ep9	:
        if ( empty( $_POST[ 'ep9' ] ) )
        { $errors[] = 'Enter Episodes 9	.'; }
    else
        { $ep9 = mysqli_real_escape_string( $link, trim( $_POST['ep9'] ) ) ; }  
        
        
       # Check for an ep1	:
        if ( empty( $_POST[ 'ep10' ] ) )
        { $errors[] = 'Enter Episodes 10	.'; }
    else
        { $ep10 = mysqli_real_escape_string( $link, trim( $_POST['ep10'] ) ) ; }  

            # On success new password into 'users' database table.
        if ( empty( $errors ) ) 
            {
                if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;    
                $sql ="UPDATE shows SET category_title = '$category_title', show_title = '$show_title', release_year = '$release_year', language = '$language', season = '$season',
                 info = '$info', img = '$img', preview = '$preview', 
                 ep1 = '$ep1', 
                 ep2 = '$ep2', 
                 ep3 = '$ep3',
                 ep4 = '$ep4', 
                 ep5 = '$ep5', 
                 ep6 = '$ep6', 
                 ep7 = '$ep7', 
                 ep8 = '$ep8', 
                 ep9 = '$ep9', 
                 ep10 = '$ep10'   WHERE id='$id'";
             if ($link->query($sql) === TRUE) {
                   header("Location: admin_showlist.php");
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
