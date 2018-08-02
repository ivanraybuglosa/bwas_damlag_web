<?php
    
    require_once 'user.php';
    
    $email = "";
    
    $password = "";
    
    if(isset($_POST['email'])){
        
        $email = $_POST['email'];
        
    }
    
    if(isset($_POST['password'])){
        
        $password = $_POST['password'];
        
    }
    
    $userObject = new User();
    
    // Login
    
        
        $hashed_password = md5($password);
        
        $json_array = $userObject->loginUsers($email, $hashed_password);
        
        echo json_encode($json_array);
?>