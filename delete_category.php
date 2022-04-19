<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminlogin_tools.php' ) ; load() ; }

include ( 'logout.html' ) ;
   
# Open database connection.
require ( 'connect_db.php' ) ;


if ( isset( $_GET['id'] ) ) $id = $_GET['id'] ;    
    $sql = "DELETE FROM category WHERE id='$id'";
 if ($link->query($sql) === TRUE) {
       header("Location: admin_categorylist.php");
    } else {
        echo "Error deleting record: " . $link->error;
    }

