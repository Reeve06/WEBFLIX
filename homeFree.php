
<?php # DISPLAY COMPLETE LOGGED IN PAGE.


# Access session.
session_start() ;




# Set page title and display header section.
$page_title = 'Whats on' ;
include ( 'login.html' ) ;
echo '<div class="container">
        <h1 class="text-center">What\'s On</h1>
  <hr color="#dc3545;">
 <br><br>

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
    <small class="text-muted"><a href="movie_watchfree.php?id='.$row['id'].'" class="btn btn-primary" role="button" >Watch Now</a></small>
    </div>

   </div>
   </div>
   <br>
   <br>
    </div><! -- closing row --> <br>

   
<br> <br>


  ';

    }
    
}

# Or display message.
else { echo '<p>There are currently no movies showing.</p>' ; }


echo '<div class="container">
    
<br><br>
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
 <small class="text-muted"><a   href="show_watchfree.php?id='.$row['id'].'" class="btn btn-primary" role="button" >Watch Now</a></small>
</div>
</div>

<br>
</div>
<br >
<br><br >

</div><! -- closing row -->
<br >
<br><br >



';

   }
 
}
# Or display message.
else { echo '<p>There are currently no TV-shows airing.</p>' ; }


echo '<div class="container">
    
<br><br>
    <h4 class="text-center">Coming Soon</h4>
    <hr color="#dc3545;">
    <br>
            <div class="row">
      
    ';

# Retrieve movies from 'coming soon' database table.
$q = "SELECT * FROM coming_soon" ;
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
<h6 class="card-title">'. $row['title'].'</h6>

</div>
</div>

<br>
</div>
<br >
<br><br >

</div><! -- closing row -->
<br >
<br><br >



';

   }

   # Close database connection.
   mysqli_close( $link) ; 
}

# Or display message.
else { echo '<p>There are currently no upcoming programs.</p>' ; }

echo '<div class="container">
            <div>  <br><br>  </div>

    ';
   
# Display footer section.
include ( 'footer.html' ) ;

?>
