<?php
    session_start();
    if(!isset($_SESSION["email"])){
        echo "<script>alert('Unauthorized login!Please log-in.');window.location.href='signin.php';</script>";
    exit(); 
    }
?>