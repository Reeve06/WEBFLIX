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

# Retrieve selective item data from 'plans' database table. 
$q = "SELECT * FROM plans WHERE id = $id" ;
$r = mysqli_query( $link, $q ) ;
if ( mysqli_num_rows( $r ) == 1 )
{
  $row = mysqli_fetch_array( $r, MYSQLI_ASSOC );

  # Check if cart already contains one plans id.
  if ( isset( $_SESSION['cart'][$id] ) )
  { 
# Add one more of this product.
    $_SESSION['cart'][$id]['quantity']++; 
        echo '

          <br><br>
       
          <div class="container">
        <div class="card text-center">
        <div class="card-header">
        <h1 class="card-title">'. $row['plans_title'].'</h1>
        </div>
        <div class="card-body">
        <img src='. $row['img'].' class="card-img-top" alt="plan" style="width: 60rem;">
        <h6 class="card-text">'. $row['info'].' This subscription Plan valued at  £' . $row['sub_price'] . '</h6>
          
        </div>
        <div class="card-footer text-muted">
        <a href="show1.php"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['show1'] . ' </button></a>
        </div>
      </div>
    
    
    
	  ';
 
        }

        else
        {
          # Or add one of this product to the cart.
          $_SESSION['cart'][$id]= array ( 'quantity' => 1, 'price' => $row['sub_price'] ) ;
       echo '       
       <br><br>
       <div class="container">
       <div class="card text-center">
       <div class="card-header">
       <h1 class="card-title">'. $row['plans_title'].'</h1>
       </div>
       <div class="card-body">
       <img src='. $row['img'].' class="card-img-top" alt="plan" style="width: 60rem;">
       <h6 class="card-text">'. $row['info'].' This subscription Plan valued at  £' . $row['sub_price'] . '</h6>
         
       </div>
       <div class="card-footer text-muted">
       <a href="show1.php"> <button type="button" class="btn btn-secondary" role="button"> ' . $row['show1'] . ' </button></a>
       </div>
     </div> ';
        }
      }
     
      # Close database connection.
      mysqli_close($link);
      
      
      # Display footer section.
      include ( 'footer.html' ) ;
      ?>