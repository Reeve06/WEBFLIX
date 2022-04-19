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


     # Check for a title.
     if (empty($_POST['show_title']))
     {
         $errors[] = 'Enter new TV Show title.';
     }
     else
     {
         $show_title = mysqli_real_escape_string($link, trim($_POST['show_title']));
     }

    # Check for a release_year.
    if (empty($_POST['release_year']))
    {
      $errors[] = 'Enter new release year.';
     }
    else
    {
      $release_year = mysqli_real_escape_string($link, trim($_POST['release_year']));
     }
     
    # Check for a language.
    if (empty($_POST['language']))
    {
      $errors[] = 'Enter new TV Show language.';
     }
    else
    {
      $language = mysqli_real_escape_string($link, trim($_POST['language']));
     }


     # Check for a season.
    if (empty($_POST['season']))
    {
      $errors[] = 'Enter new TV Show season.';
     }
    else
    {
      $season = mysqli_real_escape_string($link, trim($_POST['season']));
     }


     # Check for a info	.
    if (empty($_POST['info']))
    {
        $errors[] = 'Enter Description.';
    }
    else
    {
        $info= mysqli_real_escape_string($link, trim($_POST['info']));
    }


 # Check for a img	.
 if (empty($_POST['img']))
 {
     $errors[] = 'Enter image location .';
 }
 else
 {
     $img = mysqli_real_escape_string($link, trim($_POST['img']));
 }


  # Check for a preview	.
  if (empty($_POST['preview']))
  {
      $errors[] = 'Enter trailer.';
  }
  else
  {
      $preview = mysqli_real_escape_string($link, trim($_POST['preview']));
  }



   # Check for a ep1	.
   if (empty($_POST['ep1']))
   {
       $errors[] = 'Enter episode 1 location.';
   }
   else
   {
       $ep1 = mysqli_real_escape_string($link, trim($_POST['ep1']));
   }

   # Check for a ep2	.
   if (empty($_POST['ep2']))
   {
       $errors[] = 'Enter episode 2 location.';
   }
   else
   {
       $ep2 = mysqli_real_escape_string($link, trim($_POST['ep2']));
   }

      # Check for a ep3	.
      if (empty($_POST['ep3']))
      {
          $errors[] = 'Enter episode 3 location.';
      }
      else
      {
          $ep3 = mysqli_real_escape_string($link, trim($_POST['ep3']));
      }

         # Check for a ep4	.
   if (empty($_POST['ep4']))
   {
       $errors[] = 'Enter episode 4 location.';
   }
   else
   {
       $ep4 = mysqli_real_escape_string($link, trim($_POST['ep4']));
   }

      # Check for a ep5	.
      if (empty($_POST['ep5']))
      {
          $errors[] = 'Enter episode 5 location.';
      }
      else
      {
          $ep5 = mysqli_real_escape_string($link, trim($_POST['ep5']));
      }


         # Check for a ep6	.
   if (empty($_POST['ep6']))
   {
       $errors[] = 'Enter episode 6 location.';
   }
   else
   {
       $ep6 = mysqli_real_escape_string($link, trim($_POST['ep6']));
   }

      # Check for a ep7	.
      if (empty($_POST['ep7']))
      {
          $errors[] = 'Enter episode 7 location.';
      }
      else
      {
          $ep7 = mysqli_real_escape_string($link, trim($_POST['ep7']));
      }

         # Check for a ep8	.
   if (empty($_POST['ep8']))
   {
       $errors[] = 'Enter episode 8 location.';
   }
   else
   {
       $ep8 = mysqli_real_escape_string($link, trim($_POST['ep8']));
   }


      # Check for a ep9	.
      if (empty($_POST['ep9']))
      {
          $errors[] = 'Enter episode 9 location.';
      }
      else
      {
          $ep9 = mysqli_real_escape_string($link, trim($_POST['ep9']));
      }


         # Check for a ep10	.
   if (empty($_POST['ep10']))
   {
       $errors[] = 'Enter episode 10 location.';
   }
   else
   {
       $ep10 = mysqli_real_escape_string($link, trim($_POST['ep10']));
   }




    # Check if  show_title already registered.
if ( empty( $errors ) )
{
  $q = "SELECT id FROM shows WHERE show_title='$show_title'" ;
  $r = @mysqli_query ( $link, $q ) ;
  if ( mysqli_num_rows( $r ) != 0 ) $errors[] = 'TV Show title is already registered. <a href="admin_showlist.php">Go Back</a>' ;
}


# On success register user inserting into 'users' database table.
if ( empty( $errors ) ) 
{
  $q = "INSERT INTO shows (id, category_title, show_title, release_year, language, season, info, img, preview, ep1, ep2, ep3, ep4, ep5, ep6,ep7,ep8,ep9,ep10) 
  VALUES ('$id', '$category_title', '$show_title', '$release_year', '$language', '$season', '$info', '$img', '$preview', '$ep1', '$ep2', '$ep3', '$ep4', '$ep5', '$ep6', '$ep7', '$ep8', '$ep9', '$ep10')";
  $r = @mysqli_query ( $link, $q ) ;
  if ($r)
  {  header("Location: admin_showlist.php"); }

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
  <h5 class="card-header">Add New TV-Show</h5>
  <div class="card-body">
    <form  action="add_shows.php" method="post">
   
  <div class="form-group pb-3">   
  <input type="text" placeholder="id"class="form-control" id="exampleInputName" name="id" value="<?php if (isset($_POST['id'])) echo $_POST['id'];?>"> 
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="Category Title" class="form-control" id="exampleInputName" name="category_title"  value="<?php if (isset($_POST['category_title'])) echo $_POST['category_title'];?>">
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="TV Show Title" class="form-control" id="exampleInputName" name="show_title"  value="<?php if (isset($_POST['show_title'])) echo $_POST['show_title'];?>">
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="Release year" class="form-control" id="exampleInputName" name="release_year"  value="<?php if (isset($_POST['release_year'])) echo $_POST['release_year'];?>">
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="Language" class="form-control" id="exampleInputName" name="language"  value="<?php if (isset($_POST['language'])) echo $_POST['language'];?>">
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="Season" class="form-control" id="exampleInputName" name="season"  value="<?php if (isset($_POST['season'])) echo $_POST['season'];?>">
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="Description" class="form-control" id="exampleInputName" name="info"  value="<?php if (isset($_POST['info'])) echo $_POST['info'];?>">
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="Image location" class="form-control" id="exampleInputName" name="img"  value="<?php if (isset($_POST['img'])) echo $_POST['img'];?>">
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="trailer" class="form-control" id="exampleInputName" name="preview"  value="<?php if (isset($_POST['preview'])) echo $_POST['preview'];?>">
  </div>

  <div class="form-group pb-3">   
  <input type="text" placeholder="episode 1" class="form-control" id="exampleInputName" name="ep1"  value="<?php if (isset($_POST['ep1'])) echo $_POST['ep1'];?>">
  </div>
  <div class="form-group pb-3">   
  <input type="text" placeholder="episode 2" class="form-control" id="exampleInputName" name="ep2"  value="<?php if (isset($_POST['ep2'])) echo $_POST['ep2'];?>">
  </div>
  <div class="form-group pb-3">   
  <input type="text" placeholder="episode 3" class="form-control" id="exampleInputName" name="ep3"  value="<?php if (isset($_POST['ep3'])) echo $_POST['ep3'];?>">
  </div>
  <div class="form-group pb-3">   
  <input type="text" placeholder="episode 4" class="form-control" id="exampleInputName" name="ep4"  value="<?php if (isset($_POST['ep4'])) echo $_POST['ep4'];?>">
  </div>
  <div class="form-group pb-3">   
  <input type="text" placeholder="episode 5" class="form-control" id="exampleInputName" name="ep5"  value="<?php if (isset($_POST['ep5'])) echo $_POST['ep5'];?>">
  </div>
  <div class="form-group pb-3">   
  <input type="text" placeholder="episode 6" class="form-control" id="exampleInputName" name="ep6"  value="<?php if (isset($_POST['ep6'])) echo $_POST['ep6'];?>">
  </div>
  <div class="form-group pb-3">   
  <input type="text" placeholder="episode 7" class="form-control" id="exampleInputName" name="ep7"  value="<?php if (isset($_POST['ep7'])) echo $_POST['ep7'];?>">
  </div>
  <div class="form-group pb-3">   
  <input type="text" placeholder="episode 8" class="form-control" id="exampleInputName" name="ep8"  value="<?php if (isset($_POST['ep8'])) echo $_POST['ep8'];?>">
  </div>
  <div class="form-group pb-3">   
  <input type="text" placeholder="episode 9" class="form-control" id="exampleInputName" name="ep9"  value="<?php if (isset($_POST['ep9'])) echo $_POST['ep9'];?>">
  </div>
  <div class="form-group pb-3">   
  <input type="text" placeholder="episode 10" class="form-control" id="exampleInputName" name="ep10"  value="<?php if (isset($_POST['ep10'])) echo $_POST['ep10'];?>">
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
