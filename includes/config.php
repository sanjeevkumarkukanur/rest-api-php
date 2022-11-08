<?php

 
    // specify your own database credentials
     $host = "localhost";
     $db_name = "user_details";
     $username = "root";
     $password = "";
 
   
    // get the database connection
    
           $db = new PDO('mysql:host=127.0.0.1;dbname='.$db_name.';charset=utf8',$username,$password);
          
           $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
           $db->setAttribute(PDO::MYSQL_ATTR_USE_BUFFERED_QUERY, true);
           $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
     

?>