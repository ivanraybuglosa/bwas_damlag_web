<?php
    include_once('web_db.php');
    include_once('authentication.php');

    $id = $_GET['id'];
    $user = $pdo->findClient($id);

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $name = $_POST['updateName'];
        $contact = $_POST['updateContact'];
        $address = $_POST['updateAddress'];
        $school = $_POST['updateSchool'];
        $sport = $_POST['updateSport'];
        $email = $_POST['updateEmail'];
        $password = $_POST['updatePassword'];
        $updated_at = $_POST['updated_at'];

        if($pdo->updateUser($id,$name,$contact,$address,$school,$sport,$email,$password,$updated_at)){
            echo "<script>alert('User Information has been saved.');window.location.href='index.php';</script>";
        }else{
            echo "<script>alert('User update failed.');window.location.href='editUser.php?id=".$id."';</script>";
        }
    }
?>
<html>
    <head>
        <title>Edit User</title>
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php include_once('navbar.php'); ?>
            <center><h1>Edit User Information</h1></center>

        <form method="post">
            <input type="hidden" name="id" value="<?php echo $user['id']?>">
            <input type="hidden" name="updated_at" value="<?php echo date('Y-m-d H:i:s')?>">
            <hr>
            <div class="container">
                <small>Name</small>
                <input type="text" value="<?php echo $user['name']?>" name="updateName" required>
                <small>Contact Number</small>
                <input type="text" value="<?php echo $user['contact']?>" name="updateContact" required>
                <small>Address</small>
                <input type="text" value="<?php echo $user['address']?>" name="updateAddress" required>
                <small>School</small>
                <select name="updateSchool">
                    <option value="UNOR" <?php if($user['school'] == 'UNOR'){ echo 'selected'; } ?>>University of Negros Occidental - Recoletos</option>
                    <option value="LCC" <?php if($user['school'] == 'LCC'){ echo 'selected'; } ?>>La Consolation College - Bacolod</option>
                    <option value="USLS" <?php if($user['school'] == 'USLS'){ echo 'selected'; } ?>>University of Saint La Salle</option>
                    <option value="STI" <?php if($user['school'] == 'STI'){ echo 'selected'; } ?>>STI-WEST NEGROS</option>
                    <option value="USA" <?php if($user['school'] == 'USA'){ echo 'selected'; } ?>>University of San Agustin</option>
                </select>
                <small>Sport</small> 
                <select name="updateSport">
                    <option value="Football" <?php if($user['sport'] == 'Football'){ echo 'selected'; } ?>>Football</option>
                    <option value="Basketball" <?php if($user['sport'] == 'Basketball'){ echo 'selected'; } ?>>Basketball</option>
                    <option value="Volleyball" <?php if($user['sport'] == 'Volleyball'){ echo 'selected'; } ?>>Volleyball</option>
                </select>
                <small>Email Address</small> 
                <input type="email" value="<?php echo $user['email']?>" name="updateEmail" required>
                <small>Password</small>
                <input type="password" placeholder="Password" name="updatePassword" value="<?php echo md5($user['password'])?>">
                <hr>  
                <button name="update" type="submit">Update</button>
            </div>
        </form>
    </body>
</html>
