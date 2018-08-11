<?php
    include_once('web_db.php');
    include_once('authentication.php');

    $id = $_GET['id'];
    $user = $pdo->findClient($id);

?>
<html>
    <head>
        <title>Edit User</title>
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php include_once('navbar.php'); ?>
        <?php if($user['type'] ==  'Coach'){ ?>
            <center><h1><?php echo $user['name']?> - <?php echo $user['school']?> - <?php echo $user['sport']?></h1></center>
            <div class="container">
            <center>
                <h1>Current Athletes</h1>
                    <table id="users">
                        <thead>
                            <tr>
                                <th>Username</th>
                                <th>E-mail</th>
                                <th>School</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                            <tr>
                    </thead>
                    <tbody>
                        <?php 
                            $athletes = $pdo->fetchAthletes($user['sport'], $user['school']);
                            if(is_array($athletes) && !empty($athletes)){
                                foreach($athletes as $athlete){
                        ?>
                        <tr>
                            <td><?php echo $athlete['name']; ?></td>
                            <td><?php echo $athlete['email']; ?></td>
                            <td><?php echo $athlete['school']; ?></td>
                            <td><?php echo $athlete['contact']; ?></td>
                            <td><?php echo $athlete['address']; ?></td>
                        </tr>
                        <?php } }?>
                    </tbody>
                    </table>
            </center>
        <?php }else{?>
            <center><h1><?php echo $user['name']?> - <?php if(!empty($user['school'])){ echo $user['school'];}else{echo $user['previous_school'];} ?> - <?php echo $user['sports_name']?></h1></center>
            <div class="container">
            <center>   
                    <h3>Under Maintenance</h3>
                    <h3>[Showing stats per game]</h3>
            </center>
        <?php } ?>
        </div>
    </body>
</html>
