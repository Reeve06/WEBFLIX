<?php
# Access session.
session_start() ;

include ( 'admin_logout.html' ) ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminlogin_tools.php' ) ; load() ; }



# Check form submitted.
if ($_SERVER['REQUEST_METHOD'] == 'POST')
{
    # Connect to the database.
    require ('connect_db.php');
    # Initialize an error array.
    $errors = array();
    # Check for a id.
    if (empty($_POST['id']))
    {
        $errors[] = 'Enter new id.';
    }
    else
    {
        $id = mysqli_real_escape_string($link, trim($_POST['id']));
    }
    # Check for a title.
    if (empty($_POST['category_title']))
    {
        $errors[] = 'Enter new category title.';
    }
    else
    {
        $category_title = mysqli_real_escape_string($link, trim($_POST['category_title']));
    }

     # Check for a info.
    if (empty($_POST['info']))
    {
        $errors[] = 'Enter Description .';
    }
    else
    {
        $info = mysqli_real_escape_string($link, trim($_POST['info']));
    }

    # Check if  category_title already registered.
if ( empty( $errors ) )
{
  $q = "SELECT id FROM category WHERE category_title='$category_title'" ;
  $r = @mysqli_query ( $link, $q ) ;
  if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'category title already registered. <a href="admin_categorylist.php">Go Back</a>' ;
}


# On success register user inserting into 'users' database table.
if ( empty( $errors ) ) 
{
  $q = "INSERT INTO category (id, category_title, info) VALUES ('$id', '$category_title', '$info')";
  $r = @mysqli_query ( $link, $q ) ;
  if ($r)
  {  header("Location: admin_categorylist.php"); }

  # Close database connection.
  mysqli_close($link); 
  exit();
}

# Or report errors.
else 
{
  echo '<h1>Error!</h1><p id="err_msg">The following error(s) occurred:<br>' ;
  foreach ( $errors as $msg )
  { echo " - $msg<br>" ; }
  echo 'Please try again.</p>';
  # Close database connection.
  mysqli_close( $link );
}  
}

?>
<!doctype html>
<html lang="en-GB">
<head>
     <!-- Required meta tags -->
     <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

   <!-- Bootstrap CSS -->
   <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
   <link rel="stylesheet" href="mystyle.css">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link href="https://fonts.googleapis.com/css2?family=Courgette&display=swap" rel="stylesheet">
   <script src="https://kit.fontawesome.com/bb3ef965c3.js" crossorigin="anonymous"></script> 
   <script src="https://use.fontawesome.com/f59bcd8580.js"></script>
</head>
<body>


  <br> <br> 
<div class="card  "   >
  <h5 class="card-header">Add New Category</h5>
  <div class="card-body">
    <form  action="add_category.php" method="post">
   
  <div class="form-group pb-3">   
  <input type="text" placeholder="id"class="form-control" id="exampleInputName" name="id" value="<?php if (isset($_POST['id'])) echo $_POST['id'];?>"> 
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="Category Title" class="form-control" id="exampleInputName" name="category_title"  value="<?php if (isset($_POST['category_title'])) echo $_POST['category_title'];?>">
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="Description" class="form-control" id="exampleInputName" name="info"  value="<?php if (isset($_POST['info'])) echo $_POST['info'];?>">
  </div>

  <div class="pb-2">
  <button type="submit" class="btn btn-dark w-100 font-weight-bold mt-2"  value="add">Submit</button>
   </div>

  </form>

  </div>
</div>




  <br>
  
<?php 
# Display footer section.
include ( 'footer.html' ) ;
?>
