<?php
# Access session.
session_start() ;


include ( 'login.html' ) ;
   
# Open database connection.
require ( 'connect_db.php' ) ;

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;

   
# Open database connection.
require ( 'connect_db.php' ) ;

# Retrieve selective item data from 'movie' database table. 
$q = "SELECT * FROM movie WHERE id = $id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{

    # Display body section.
    while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
    {
     

          
      echo '<div class="container">
      <h1 class="display-4">'.$row['movie_title'].'</h1>
  <div class="row">
      <div class="col-sm-12 col-md-4">
        <div class="embed-responsive embed-responsive-16by9">
          <iframe class="embed-responsive-item" src='. $row['preview'].' 
              frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
              allowfullscreen>
          </iframe>
         </div>
         <br>
         <h2>Category</h3>
         <hr color="#dc3545;">
         <h3><span class="badge badge-secondary">'.$row['category_title'].'</span></h3>
         <br>
         <h3>Release Year : <span class="badge badge-secondary">'.$row['release_year'].'</span></h3> 
         <br>
         <h3>Language : <span class="badge badge-secondary">'.$row['language'].'</span></h3>    
      </div>

      <div class="col-sm-12 col-md-4">
          <p>'.$row['info'].'</p>
     <br>

      </div>

     
      
  <div class="col-sm-12 col-md-4">
          
          <hr color="#dc3545;">
          <img src='. $row['img'].' class="card-img-top" alt="Movie" >  
          
          <hr color="#dc3545;">
  
      </div>

      
  </div>
  
 
      
          
          

  </div>
 
  
  </div>
  
  
  
  </div><br><br>
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

