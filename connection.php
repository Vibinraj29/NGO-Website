<?php
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $database = 'nvfoundation';

        $conn = mysqli_connect($server,$username,$password,$database);

    if($conn){
       // echo 'Successfull';
    }
    else{
        die("connection to this database failed due to " .mysqli_connect_error());
    }
?>
