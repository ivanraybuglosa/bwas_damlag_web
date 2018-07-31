<?php
    include_once('web_db.php');
    include_once('authentication.php');
    $school = $_GET['school'];

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
        <center><h1><?php echo $school ?></h1></center>
            <table id="users">
                <thead>
                        <tr>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>Contact</th>
                            <th>Sport</th>
                            <th>Type</th>
                        <tr>
                </thead>
                <tbody>
                    <?php 
                        $users = $pdo->fetchSchool($school);
                        if(is_array($users) && !empty($users)){
                            foreach($users as $user){
                    ?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['contact']; ?></td>
                        <td><?php echo $user['sport']; ?></td>
                        <td><?php echo $user['type']; ?></td>
                    </tr>
                    <?php } }?>
                </tbody>
            </table>
    </body>
</html>