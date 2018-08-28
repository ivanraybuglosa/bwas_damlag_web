<?php
    include_once('web_db.php');
    include_once('authentication.php');
    $getSchool = $_GET['school'];

    if(isset($_POST['delete'])){
        $id = $_POST['id'];

        if($pdo->deleteUser($id)){
            echo "<script>alert('User Information has been successfully removed!');window.location.href='sport.php?sport=".$getSchool."';</script>";
        }else{
            echo "<script>alert('Unable to remove the user.');window.location.href='sport.php?sport=".$getSchool."'';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>School</title>
        <link href="styles.css" rel="stylesheet" />
        <style> 
            input[type=text] {
                width: 200px;
                box-sizing: border-box;
                border: 2px solid #ccc;
                border-radius: 4px;
                font-size: 16px;
                background-color: white;
                background-image: url('images/search.png');
                background-position: 5px 7px; 
                background-repeat: no-repeat;
                padding: 12px 20px 12px 40px;
                -webkit-transition: width 0.4s ease-in-out;
                transition: width 0.4s ease-in-out;
            }

            input[type=text]:focus {
                width: 100%;
            }
        </style>
    </head>
    <body>
        <?php include('navbar.php') ?>
        <div class="container">
            <center>
                <h1>
                    <?php if($getSchool == 'UNOR'){
                        echo 'University of Negros Occidental - Recoletos';
                    }elseif($getSchool == 'LCC'){
                        echo 'La Consolation College - Bacolod';
                    }elseif($getSchool == 'USLS'){
                        echo 'University of Saint La Salle';
                    }elseif($getSchool == 'STI'){
                        echo 'STI-WEST NEGROS';
                    }else{
                        echo 'University of San Agustin';
                    }?>
                </h1>
                <table id="users">
                    <thead>
                            <tr>
                                <th>Username</th>
                                <th>E-mail</th>
                                <th>Contact</th>
                                <th>Sport</th>
                                <th>Gender</th>
                                <th>Type</th>
                                <th>Actions</th>
                            <tr>
                    </thead>
                    <tbody>
                        <?php 
                            $users = $pdo->fetchSchool($getSchool);
                            if(is_array($users) && !empty($users)){
                                foreach($users as $user){
                        ?>
                        <tr>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['contact']; ?></td>
                            <td><?php echo $user['sport']; ?></td>
                            <td><?php echo $user['gender']; ?></td>
                            <td><?php echo $user['type']; ?></td>
                            <td>
                                <a class="view-profile" href="userProfile.php?id=<?php echo $user['id']?>">View Profile</a>
                                <form method="post" class="delete-form">
                                    <input type="hidden" name="id" value="<?php echo $user['id']?>"/>
                                    <button class="delete-button" type="submit" name="delete">Delete</button>
                                </form>
                            </td>   
                        </tr>
                        <?php } }?>
                    </tbody>
                </table>
            </center>
        </div>
    </body>
</html>