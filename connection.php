<?php  
       $servername = "localhost";  
       $username = "root";  
       $password = "";  
       $conn = mysqli_connect ($servername , $username , $password) ;
       if (!$conn) {
        die("Database connection failed");
    }
    
    // 2. Select a database to use 
    $db_select = mysqli_select_db($conn,form);
    if (!$db_select) {
        die("Database selection failed: " . mysqli_error($connection));
    }
    ?>
