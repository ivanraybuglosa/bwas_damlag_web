<?php
    include_once('web_db.php');
    include_once('authentication.php');

    if(isset($_POST['delete'])){
        $id = $_POST['id'];

        if($pdo->deleteUser($id)){
            echo "<script>alert('User Information has been successfully removed!');window.location.href='index.php';</script>";
        }else{
            echo "<script>alert('Unable to remove the user.');window.location.href='index.php';</script>";
        }
    }
?>  
<html>
    <head>
        <title>Dashboard</title>
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php include('navbar.php') ?>

        <?php 
            if($current_user['type'] == 'Admin'){?>
            <center>
            <h1>List of Activated Users</h1>
                <table id="users">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>School</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                            <th>Actions</th>
                        <tr>
                </thead>
                <tbody>
                    <?php 
                        $users = $pdo->fetchUsers();
                        if(is_array($users) && !empty($users)){
                            foreach($users as $user){
                    ?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td>
                            <?php if(!empty($user['school'])){
                                echo $user['school'];
                            }else{
                                echo $user['previous_school'];
                            } ?></td>
                        <td><?php echo $user['sport']; ?></td>
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
        <?php }else{ ?>
            <center>
            <h1>List of Registered Athletes</h1>
                <table id="users">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>School</th>
                            <th>Last School Attended</th>
                            <th>Contact Number</th>
                            <th>Address</th>
                            <th>Actions</th>
                        <tr>
                </thead>
                <tbody>
                    <?php 
                        $users = $pdo->fetchAllAthletes($current_user['sport']);
                        if(is_array($users) && !empty($users)){
                            foreach($users as $user){
                    ?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php if(empty($user['school'])){
                            echo 'N/A';}
                        ?></td>
                        <td><?php echo $user['previous_school']; ?></td>
                        <td><?php echo $user['contact']; ?></td>
                        <td><?php echo $user['address']; ?></td>
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

        <?php } ?>
    </body>
    
</html>