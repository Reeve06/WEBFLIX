<?php
# Access session.
session_start() ;

# Redirect if not logged in.
if ( !isset( $_SESSION[ 'admin_id' ] ) ) { require ( 'adminlogin_tools.php' ) ; load() ; }

include ( 'logout.html' ) ;
   
# Open database connection.
require ( 'connect_db.php' ) ;


if ( isset( $_GET['user_id'] ) ) $user_id = $_GET['user_id'] ;    
    $sql = "DELETE FROM users WHERE user_id='$user_id'";
 if ($link->query($sql) === TRUE) {
       header("Location: admin_userlist.php");
    } else {
        echo "Error deleting record: " . $link->error;
    }

