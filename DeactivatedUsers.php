<?php
    include_once('web_db.php');
    include_once('authentication.php');

    if(isset($_POST['update'])){
        $id = $_POST['id'];
        $status = $_POST['status'];

        if($pdo->updateStatus($id,$status)){
            echo "<script>alert('User has been successfully activated!');window.location.href='index.php';</script>";
        }else{
            echo "<script>alert('User activation failed!');window.location.href='index.php';</script>";
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
        <center>
            <?php
                $users = $pdo->fetchCoaches(); 
                if(!empty($users)){
            ?>
            <h1>Activate Coach Accounts</h1>
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
                        if(is_array($users)){
                            foreach($users as $user){
                    ?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['school']; ?></td>
                        <td><?php echo $user['contact']; ?></td>
                        <td><?php echo $user['address']; ?></td>
                        <td>
                            <a class="edit-button" href="userEdit.php?id=<?php echo $user['id']?>">Edit</a>
                            <form method="post" class="delete-form">
                                <input type="hidden" name="id" value="<?php echo $user['id']?>"/>
                                <button class="delete-button" type="submit" name="delete">Delete</button>
                            </form>
                            <form method="post" class="delete-form">
                                <input type="hidden" name="status" value="Activated"/>
                                <input type="hidden" name="id" value="<?php echo $user['id']?>"/>
                                <button class="update-button" type="submit" name="update">Activate</button>
                            </form>
                        </td>
                    </tr>
                    <?php } }?>
                        
                </tbody>
            </table>
            <?php }else{?>
                <h1>All coach accounts are activated.</h1>
            <?php } ?>
        </center>
    </body>
</html>