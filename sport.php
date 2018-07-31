<?php
    include_once('web_db.php');
    include_once('authentication.php');
    $sport = $_GET['sport'];

?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>School</title>
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php include('navbar.php') ?>
        <center><h1><?php echo $sport ?></h1></center>
            <table id="users">
                <thead>
                        <tr>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>Contact</th>
                            <th>School</th>
                            <th>Type</th>
                        <tr>
                </thead>
                <tbody>
                    <?php 
                        $users = $pdo->fetchSport($sport);
                        if(is_array($users) && !empty($users)){
                            foreach($users as $user){
                    ?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['contact']; ?></td>
                        <td><?php echo $user['school']; ?></td>
                        <td><?php echo $user['type']; ?></td>
                    </tr>
                    <?php } }?>
                </tbody>
            </table>
    </body>
</html>