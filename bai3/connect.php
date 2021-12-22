<?php
    $server = 'localhost';
    $user = 'root';
    $password = '';
    $database = 'baitap3';
    $conn = new mysqli($server, $user, $password, $database);
    if($conn){
        mysqLi_query($conn , "SETNAME 'utf8' ");
        
    }else{
        echo "loi ket noi";
    }
?>