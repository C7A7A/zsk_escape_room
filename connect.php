<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'escape_room';
    $conn = @new mysqli($server, $user, $password, $database);

   if(mysqli_connect_errno()){
        printf("Connect failed: %s\n", mysqli_connect_error());
        exit();
   }

   $conn->set_charset('utf8');
    
?>