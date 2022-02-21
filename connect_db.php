<?php
$link = mysqli_connect
    ('localhost','HNCNETSA6','rL3akpw4rG','HNCNETSA6');
    if (!$link){
        
        die('Could not connect to MySQL: ' . mysqli_error());
    }
#echo 'Connection OK';


?>