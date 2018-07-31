<?php
    
    require_once 'user.php';
    
    $name = "";
    
    $password = "";
    
    $email = "";

    $contactNumber = "";

    $school = "";

    $address = "";

    $sport = "";

    
    if(isset($_POST['name'])){
        
        $name = $_POST['name'];
        
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
    if(isset($_POST['sport'])){
        
        $sport = $_POST['sport'];
        
    }

    if(isset($_POST['contactNumber'])){
        
        $contactNumber = $_POST['contactNumber'];
        
    }
    
        $userObject = new User();
        
        $hashed_password = md5($password);
        
        $json_registration = $userObject->createNewRegisterUser($name,$password,$email,$school,$address,$contactNumber,$sport);
        
        echo json_encode($json_registration);
        
    
    
?>