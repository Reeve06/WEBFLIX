
<?php # DISPLAY COMPLETE LOGGED IN PAGE.


# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminlogin_tools.php' ) ; load() ; }


# Set page title and display header section.
$page_title = 'showlist ' ;
include ( 'admin_logout.html' ) ;
echo '<div class="container">
        <h1 class="text-center">TV-Shows List </h1>
  <hr color="#dc3545;"> 
<br>
            <div class="row">
            <button type="button" class="btn btn-primary btn-lg btn-block"><a href="add_shows.php">Add New TV-Shows</a></button>
    ';

# Open database connection.
require ( 'connect_db.php' ) ;


# Retrieve items from 'shows' database table.
$q = "SELECT * FROM shows" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
    echo '<div class="col-sm">';

    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
    {
    echo '

    <div class="alert alert-secondary" alert-dismissible fade show" role="alert">
     
        <h1>TV-Show</h1>
  <br>
    <h5  ><strong> Shows ID :  '  . $row['id'] . ' </strong></h5>    
    <h5><strong> Shows Name: </strong> '  . $row['show_title'] . '  </h5>
    <h5><strong> Categorys : </strong> '  . $row['category_title'] . ' </h5>
    <h5><strong> Release year: </strong> '  . $row['release_year'] . '  </h5>
    <h5><strong> Language : </strong> '  . $row['language'] . ' </h5>
    <h5><strong> season : </strong> '  . $row['season'] . '  </h5>
    <h5><strong> Description : </strong> '  . $row['info'] . ' </h5>
    <h5><strong> Image location: </strong> '  . $row['img'] . '  </h5>
    <h5><strong> trailer : </strong> '  . $row['preview'] . ' </h5>
            <h5><strong> Episodes1: </strong> '  . $row['ep1'] . '  </h5>
            <h5><strong> Episodes2: </strong> '  . $row['ep2'] . ' </h5>
            <h5><strong> Episodes3: </strong> '  . $row['ep3'] . '  </h5>
            <h5><strong> Episodes4: </strong> '  . $row['ep4'] . ' </h5>
            <h5><strong> Episodes5: </strong> '  . $row['ep5'] . ' </h5>  
            <h5><strong> Episodes6: </strong> '  . $row['ep6'] . ' </h5>  
            <h5><strong> Episodes7: </strong> '  . $row['ep7'] . ' </h5>  
            <h5><strong> Episodes8: </strong> '  . $row['ep8'] . ' </h5>  
            <h5><strong> Episodes9: </strong> '  . $row['ep9'] . ' </h5>  
            <h5><strong> Episodes10: </strong> '  . $row['ep10'] . ' </h5>    
      

    <button type="button" class="btn btn-outline-success"> <a href="edit_shows.php?id='.$row['id'].'">Edit</a></button>
    <button type="button" class="btn btn-outline-danger"> <a href="delete_shows.php?id='.$row['id'].'">Delete</a></button>


   

   
    </div><br>
    ' ;
    }

# Close database connection.
mysqli_close( $link ) ; 
}
else { echo '<div class="alert alert-danger" alert-dismissible fade show" role="alert">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
            <h1>NO TV-Shows</h1>
 
        </div></div></div><br>
        
' ; }

# Display footer section.
include ( 'footer.html' ) ; 
?>
