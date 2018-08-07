<?php
    require_once('web_db.php');
    if(isset($_POST['register'])){
        $name = $_POST['name'];
        $contact = $_POST['contact'];
        $address = $_POST['address'];
        $school = $_POST['school'];
        $sport = $_POST['sport'];
        $email = $_POST['email'];
        $birthdate = $_POST['birthdate'];
        $gender = $_POST['gender'];
        $password = md5($_POST['password']);
        $created_at = date('Y-m-d H:i:s');
        $updated_at = date('Y-m-d H:i:s');
        $type = $_POST['type'];
        $status = $_POST['status'];

        if(empty($pdo->checkEmail($email))){
            if($pdo->signup($name,$contact,$address,$school,$sport,$email,$birthdate,$gender,$password,$created_at,$updated_at,$type,$status)){
                echo "<script>alert('User Information has been saved successfully.');window.location.href='signin.php';</script>";
            }else{
                echo "<script>alert('Invalid Information');window.location.href='signup.php';</script>";
            }
        }else{
            echo "<script>alert('User email is existing.');window.location.href='signup.php';</script>";
        }
        
    }
?>
<html>
    <head>
        <title>Sign-up</title>
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
            <div class="imgcontainer">
                <img src="images/logo.png" alt="Avatar" class="avatar" style="width:250px; height:150px;">
                <h1>Coach Signup</h1>
            </div>

        <form method="post" class="signup-form">
            <input type="hidden" name="type" value="Coach">
            <input type="hidden" name="status" value="Deactivated">
            <hr>
            <div class="container">
                <small>Name</small>
                <input type="text" placeholder="Coach Name" name="name" required>
                <small>Contact Number</small>
                <input type="text" placeholder="Contact Number" name="contact" required>
                <small>Address</small>
                <input type="text" placeholder="Address" name="address" required>
                <small>Birthdate</small>
                <input type="date" name="birthdate" required>
                <small>School</small>
                <select name="school">
                    <option value="UNOR">University of Negros Occidental - Recoletos</option>
                    <option value="LCC">La Consolation College - Bacolod</option>
                    <option value="USLS">University of Saint La Salle</option>
                    <option value="STI">STI-WEST NEGROS</option>
                    <option value="USA">University of San Agustin</option>
                </select>
                <small>Sport</small> 
                <select name="sport">
                    <option value="Football">Football</option>
                    <option value="Basketball">Basketball</option>
                    <option value="Volleyball">Volleyball</option>
                </select>
                <small>Email Address</small> 
                <input type="email" placeholder="Email Address" name="email" required>
                <small>Password</small>
                <input type="password" placeholder="Password" name="password" required>
                
                <center class="padding">
                    <input type="radio" name="gender" value="Male" required>Male
                    <input type="radio" name="gender" value="Female" required>Female
                </center>
                <hr>  
                <small><a href="signin.php">Already have an account? Sign-in now!<a></small>
                <button class="button" name="register" type="submit">Signup</button>
            </div>
        </form>
    </body>
</html>