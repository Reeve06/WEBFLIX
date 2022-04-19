
<?php # DISPLAY COMPLETE LOGGED IN PAGE.


# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminlogin_tools.php' ) ; load() ; }


# Set page title and display header section.
$page_title = 'category list ' ;
include ( 'admin_logout.html' ) ;
echo '<div class="container">
        <h1 class="text-center">Category List </h1>
  <hr color="#dc3545;"> 
<br>
            <div class="row">
            <button type="button" class="btn btn-primary btn-lg btn-block"><a href="add_category.php">Add New Category</a></button>
    ';

# Open database connection.
require ( 'connect_db.php' ) ;


# Retrieve items from 'category' database table.
$q = "SELECT * FROM category" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) > 0 )
{
    echo '<div class="col-sm">';

    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
    {
    echo '

    <div class="alert alert-secondary" alert-dismissible fade show" role="alert">
     
        <h1>category</h1>
  <br>
    <h5  ><strong> Category ID :  '  . $row['id'] . ' </strong></h5>    
    <h5><strong> Category Name: </strong> '  . $row['category_title'] . '  </h5>
    <h5><strong> Category Description : </strong> '  . $row['info'] . ' </h5>


    <button type="button" class="btn btn-outline-success"> <a href="edit_category.php?id='.$row['id'].'">Edit</a></button>
    <button type="button" class="btn btn-outline-danger"> <a href="delete_category.php?id='.$row['id'].'">Delete</a></button>


   

   
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
            <h1>NO CATEGORYS</h1>
 
        </div></div></div><br>
        
' ; }

# Display footer section.
include ( 'footer.html' ) ; 
?>
