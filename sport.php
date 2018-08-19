<?php
    include_once('web_db.php');
    include_once('authentication.php');
    $getSport = $_GET['sport'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Sport</title>
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
            <center><h1><?php echo $getSport ?></h1>
                <table id="users">
                <thead>
                        <tr>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>Contact</th>
                            <th>School</th>
                            <th>Gender</th>
                            <th>Type</th>
                            <th>Actions</th>
                        <tr>
                </thead>
                <tbody>
                    <?php 
                        $users = $pdo->fetchSport($getSport);
                        if(is_array($users) && !empty($users)){
                            foreach($users as $user){
                    ?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['contact']; ?></td>
                        <td><?php if(empty($user['school'])){
                                    echo $user['previous_school'];
                            }else{
                                echo $user['school'];
                            } ?></td>
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