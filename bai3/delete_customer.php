<?php
    include 'connect.php';
    $this_id = $_GET['this_id'];
    $sql = "DELETE FROM user WHERE id_customer='$this_id'";
    mysqli_query($conn,$sql);
    header('Location:listCustomer.php');
    
?>