
<?php # DISPLAY COMPLETE LOGGED IN PAGE.


# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminlogin_tools.php' ) ; load() ; }


# Set page title and display header section.
$page_title = 'Dashboard ' ;
include ( 'admin_logout.html' ) ;
echo '<div class="container">
        <h1 class="text-center">Dashboard </h1>
  <hr color="#dc3545;"> 
<br>
            <div class="row">
    ';

# Open database connection.
require ( 'connect_db.php' ) ;



echo '<div class="container">
        <div>  <br><br>  </div>

        <div class="row row-cols-1 row-cols-md-2">
        <div class="col mb-4">
          <div class="card">
            <img src="img/a1.jpg" class="card-img-top" alt="user">
            <div class="card-body">
              <h5 class="card-title"> Users </h5>
              <h6 class="card-text">Administrator is able to amend the users for the list.</h6>
              <a href="admin_userlist.php" class="btn btn-primary">View Users</a>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card">
          <img src="img/a2.jpg" class="card-img-top" alt="Category">
            <div class="card-body">
              <h5 class="card-title"> Category </h5>
              <h6 class="card-text">Administrator is able to amend the categorys for the list.</h6>
              <a href="admin_categorylist.php" class="btn btn-primary">View Categorys list</a>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card">
          <img src="img/a3.jpg" class="card-img-top" alt="movies">
            <div class="card-body">
              <h5 class="card-title"> Movie </h5>
              <h6 class="card-text">Administrator is able to amend the movies for the list.</h6>
              <a href="admin_movielist.php" class="btn btn-primary">View Movies list</a>
            </div>
          </div>
        </div>
        <div class="col mb-4">
          <div class="card">
          <img src="img/a4.jpg" class="card-img-top" alt="tv-shows">
            <div class="card-body">
              <h5 class="card-title"> TV Show </h5>
              <h6 class="card-text">Administrator is able to amend the tv-shows for the list.</h6>
              <a href="admin_showlist.php" class="btn btn-primary">View TV-Shows list</a>
            </div>
          </div>
        </div>
      </div>


';

echo '<div class="container">
<div>  <br><br>  </div>

';

# Display footer section.
include ( 'footer.html' ) ;

?>
