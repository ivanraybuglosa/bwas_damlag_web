<?php
    
    require_once 'user.php';
    
    $username = "";
    
    $password = "";
    
    $email = "";

    $contactnumber = "";

    $school = "";

    $address = "";
    
    if(isset($_POST['username'])){
        
        $username = $_POST['username'];
        
    }
    
    if(isset($_POST['password'])){
        
        $password = $_POST['password'];
        
    }
    
    if(isset($_POST['email'])){
        
        $email = $_POST['email'];
        
    }

    if(isset($_POST['school'])){
        
        $school = $_POST['school'];
        
    }

    if(isset($_POST['address'])){
        
        $address = $_POST['address'];
        
    }

    if(isset($_POST['contactNumber'])){
        
        $contactNumber = $_POST['contactNumber'];
        
    }
    
    $userObject = new User();
    
    // Registration
    
    if(!empty($username) && !empty($password) && !empty($email) && !empty($school) && !empty($contactNumber) && !empty($address)){
        
        $hashed_password = md5($password);
        
        $json_registration = $userObject->createNewRegisterUser($username, $hashed_password, $email, $school, $contactNumber, $address);
        
        echo json_encode($json_registration);
        
    }
    
    // Login
    
    if(!empty($username) && !empty($password) && empty($email)){
        
        $hashed_password = md5($password);
        
        $json_array = $userObject->loginUsers($username, $hashed_password);
        
        echo json_encode($json_array);
    }
?>