
<?php # DISPLAY COMPLETE LOGGED IN PAGE.


# Access session.
session_start() ;

# Open database connection.
require ( 'connect_db.php' ) ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminlogin_tools.php' ) ; load() ; }

# Get passed product id and assign it to a variable.
if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;

include ( 'admin_logout.html' ) ;


# Set page title and display header section.
$page_title = 'showsedit ' ;
echo '<div class="container">
        <h1 class="text-center">TV-Show Edit </h1>
  <hr color="#dc3545;"> 
<br>
            <div class="row">
    	<div class="col-sm">';



# Retrieve selective item data from 'shows' database table. 
$q = "SELECT * FROM shows WHERE id = $id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
	
	
		while ( $row = mysqli_fetch_array( $r, MYSQLI_ASSOC ))
		{
            echo '
        
            <div class="alert alert-secondary" alert-dismissible fade show" role="alert">
             
                <h1>TV-Show</h1>
      
            <br>
            <form method="POST" action="update_show.php?id='.$row['id'].'">
              <h5  ><strong> TV-Show ID :  '  . $row['id'] . ' </strong></h5>    
              <h5><strong><label> TV-Shows Name: </label></strong><input type="text" value=" '  . $row['show_title'] . '" name="show_title">  </h5>
              <h5><strong><label> Categorys : </label></strong><input type="text" value=" '  . $row['category_title'] . '" name="category_title"> </h5>
              <h5><strong><label> Release year: </label></strong><input type="text" value=" '  . $row['release_year'] . '" name="release_year">  </h5>
              <h5><strong><label> Language : </label></strong><input type="text" value=" '  . $row['language'] . '" name="language"> </h5>
              <h5><strong><label> Season : </label></strong><input type="text" value=" '  . $row['season'] . '" name="season">  </h5>
              <h5><strong><label> Description : </label></strong><input type="text" value=" '  . $row['info'] . '" name="info"> </h5>
              <h5><strong><label> Image location: </label></strong><input type="text" value=" '  . $row['img'] . '" name="img">  </h5>
              <h5><strong><label> trailer : </label></strong><input type="text" value=" '  . $row['preview'] . '" name="preview"> </h5>
              <h5><strong><label> Episode1: </label></strong><input type="text" value=" '  . $row['ep1'] . '" name="ep1">  </h5>
              <h5><strong><label> Episode2: </label></strong><input type="text" value=" '  . $row['ep2'] . '" name="ep2">  </h5>
              <h5><strong><label> Episode3: </label></strong><input type="text" value=" '  . $row['ep3'] . '" name="ep3">  </h5>
              <h5><strong><label> Episode4: </label></strong><input type="text" value=" '  . $row['ep4'] . '" name="ep4">  </h5>
              <h5><strong><label> Episode5: </label></strong><input type="text" value=" '  . $row['ep5'] . '" name="ep5">  </h5>
              <h5><strong><label> Episode6: </label></strong><input type="text" value=" '  . $row['ep6'] . '" name="ep6">  </h5>
              <h5><strong><label> Episode7: </label></strong><input type="text" value=" '  . $row['ep7'] . '" name="ep7">  </h5>
              <h5><strong><label> Episode8: </label></strong><input type="text" value=" '  . $row['ep8'] . '" name="ep8">  </h5>
              <h5><strong><label> Episode9: </label></strong><input type="text" value=" '  . $row['ep9'] . '" name="ep9">  </h5>
              <h5><strong><label> Episode10: </label></strong><input type="text" value=" '  . $row['ep10'] . '" name="ep10">  </h5>
              <input type="submit" name="submit">
              <a href="admin_showlist.php">Back</a>	
              </form>      
      
  
          </div>
          </div></div><br>
  
          ' ;
          }
      
      # Close database connection.
      mysqli_close( $link ) ; 
      }
      else { echo '<div class="alert alert-danger" alert-dismissible fade show" role="alert">
              <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
              </button>
                  <h3>No TV-Show to edit.</h3>
              </div></div></div><br>
              
      ' ; }
      
      # Display footer section.
      include ( 'footer.html' ) ; 
      ?>
      