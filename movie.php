<?php # DISPLAY COMPLETE LOGGED IN PAGE.


    # Access session.
    session_start() ;


  
    # Set page title and display header section.
    $page_title = 'Movies' ;
    include ( 'logout.html' ) ;
    echo '<div class="container">
			<h1 class="text-center">Movies</h1>
      <hr color="#dc3545;">
     <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="movie.php">Movies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tv_shows.php">TV-Shows</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="home.php">Home</a>
        </li>
      </ul> 
      <br>
<div class="row">
<br><br>   
        
        
        
        ';

    # Open database connection.
    require ( 'connect_db.php' ) ;

    # Retrieve movies from 'movie' database table.
    $q = "SELECT * FROM movie" ;
    $r = mysqli_query( $link, $q ) ;
    if ( mysqli_num_rows( $r ) > 0 )
    {

  # Display body section.
  while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
  {
  echo '
  <br><br>
  <div class="col-md-3 d-flex justify-content-center">
  <br><br>
  <div class=" card card-group text-center">
<div class="card">
<img src='. $row['img'].' class="card-img-top" alt="show"  style="hight: 30px;">  
<div class="card-body">
<h6 class="card-title">'. $row['movie_title'].'</h6>

</div>
<div class="card-footer">
<small class="text-muted"><a   href="show_watch.php?id='.$row['id'].'" class="btn btn-primary" role="button" >Watch Now</a></small>
</div>

</div>
</div>

</div><! -- closing row -->
<br >
<br>


';

  }

  # Close database connection.
  mysqli_close( $link) ; 
}

# Or display message.
else { echo '<p>There are currently no movies showing.</p>' ; }


echo '<br><br><br><br><br><br>';

    echo '<div class="container">
            <div>  <br><br>  </div>

    ';
# Display footer section.
include ( 'footer.html' ) ;

?>