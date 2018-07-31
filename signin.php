<?php
    session_start();
    require_once('web_db.php');
    if(isset($_POST['login'])){
        $email = $_POST['email'];
        $password = md5($_POST['password']);

        $status = $pdo->checkEmail($email);
        if($status['status'] == 'Activated'){
            if($pdo->login($email,$password)){
                $_SESSION['email'] = $email;
                echo "<script>alert('Welcome to Bwas Damlag Web Application');window.location.href='index.php';</script>";
            }else{
                echo "<script>alert('Invalid User Credentials');window.location.href='signin.php';</script>";
            }
        }else{
            echo "<script>alert('The system administrator hasn't activated your account yet.);window.location.href='signin.php';</script>";
        }
    }
?>
<html>
    <head>
        <title>Sign-in</title>
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
        <div class="border">
            <div class="imgcontainer">
                <img src="logo.png" alt="Avatar" class="avatar" style="width:350px; height:300px;">
            </div>
            <form method="post" class="signin-form">
                <div class="container">
                    <small>Email Address</small>
                    <input type="email" placeholder="Email Address" name="email" required>
                    <small>Password</small>
                    <input type="password" placeholder="Password" name="password" required>
                    <small><a href="signup.php">Create an account</a></small> 
                    <button class="button" name="login" type="submit">Login</button>
                </div>
            </form>
        </div>
    </body>
</html>