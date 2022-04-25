
<?php # DISPLAY COMPLETE LOGGED IN PAGE.


    # Access session.
    session_start() ;

    # Redirect if not logged in.
    if ( !isset( $_SESSION[ 'user_id' ] ) ) { require ( 'login_tools.php' ) ; load() ; }

  
    # Set page title and display header section.
    $page_title = 'Whats on' ;
    include ( 'logout.html' ) ;
    echo '<div class="container">
			<h1 class="text-center">What\'s On</h1>
      <hr color="#dc3545;">
     <ul class="nav nav-tabs">
        <li class="nav-item">
          <a class="nav-link active" href="home.php">Home</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="movie.php">Movies</a>
        </li>
        <li class="nav-item">
          <a class="nav-link" href="tv_shows.php">TV Shows</a>
        </li>
      </ul> 
      <hr color="#dc3545;">
<br>
<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" style="height: 18rem;">
  <ol class="carousel-indicators" style="height: 18rem;">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner" style="height: 18rem;">
    <div class="carousel-item active" style="height: 18rem;">
      <img src="img/slide1.jpg" class="d-block w-100" alt="slide1" style="height: 18rem;">
    </div>
    <div class="carousel-item" style="height: 18rem;">
      <img src="img/slide2.jpg" class="d-block w-100" alt="slide2" style="height: 18rem;">
    </div>
    <div class="carousel-item" style="height: 18rem;">
      <img src="img/slide3.jpg" class="d-block w-100" alt="slide3" style="height: 18rem;">
    </div>
  </div>
  <button class="carousel-control-prev" type="button" data-target="#carouselExampleIndicators" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-target="#carouselExampleIndicators" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </button>
</div><br><br>

<h4 class="text-center">Movies</h4>
        <hr color="#dc3545;">

				<div class="row">
        
        
        
        
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

          
        <div class="col-md-3 d-flex justify-content-center">
      
        <div class=" card card-group text-center">
        <div class="card">
        <img src='. $row['img'].' class="card-img-top" alt="Movie"  style="hight: 30px;">  
        <div class="card-body">
        <h6 class="card-title">'. $row['movie_title'].'</h6>
     
        </div>
        <div class="card-footer">
        <small class="text-muted"><a   href="movie_watch.php?id='.$row['id'].'" class="btn btn-primary" role="button" >Watch Now</a></small>
        </div>
       </div>
   
       </div>
     
        </div><! -- closing row --> <br>
    
       
   <br> <br>
 
    
	  ';
 
        }


    }

    # Or display message.
    else { echo '<p>There are currently no movies showing.</p>' ; }


    echo '
 
    <div class="container">
    <br> <br>

        <h4 class="text-center">TV-shows</h4>
        <hr color="#dc3545;">
        <br>
				<div class="row"> 
        ';


   # Retrieve movies from 'shows' database table.
   $q = "SELECT * FROM shows" ;
   $r = mysqli_query( $link, $q ) ;
   if ( mysqli_num_rows( $r ) > 0 )
   {

       # Display body section.
       while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
       {
       echo '
     
       <div class="col-md-3 d-flex justify-content-center">
       <div class=" card card-group text-center">
 <div class="card">
 <img src='. $row['img'].' class="card-img-top" alt="show"  style="hight: 30px;">  
   <div class="card-body">
   <h6 class="card-title">'. $row['show_title'].'</h6>
    
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
   else { echo '<p>There are currently no TV-shows airing.</p>' ; }

   echo '<div class="container">
            <div>  <br><br>  </div>

    ';

   # Display footer section.
   include ( 'footer.html' ) ;

?>
