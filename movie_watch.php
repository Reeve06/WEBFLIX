<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; } 

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;

include ( 'logout.html' ) ;
   
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
  
  <div class="card-body">
  <div class="embed-responsive embed-responsive-16by9">
  <iframe class="embed-responsive-item" src='. $row['full_movie'].' 
      frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" 
      allowfullscreen>
  </iframe>
 </div>
  </div>  

 
          <h4>Movie Reviews</h4>
          <hr color="#dc3545;">
          <h2>
          <a href="mov-rev.php?movie_title='.$row['movie_title'].'"> <button type="button" class="btn btn-secondary" role="button"> Write Review  </button></a>
          </h2><br>  <br> 
          <h2><a href="review.php?id='.$row['id'].'"> <button type="button" class="btn btn-secondary" role="button"> All Reviews </button></a>
          </h2><br> <br> 
          
          

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


echo '<div class="container">
<div>  <br><br>  </div>

';

# Display footer section.
include ( 'footer.html' ) ;

?>


