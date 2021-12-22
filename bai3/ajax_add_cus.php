<?php
    include "connect.php";
    if(isset($_POST['firstname'])){
        $id ="";
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];
        $username = $_POST['username'];
        $password = $_POST['password'];
        $dob = $_POST['dob'];
        $phonenumber = $_POST['phonenumber'];
        $address = $_POST['address'];
        $sql = "INSERT INTO user (id_customer , username , password , first_name , last_name, dob, address, phone_num)
        VALUES ( '', '$username', '$password', '$firstname', '$lastname' , '$dob', '$address', '$phonenumber');
        ";
       
        mysqli_query($conn, $sql);
        
    }
?>