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

        <?php 
            if($current_user['type'] == 'Admin'){?>
            <center>
            <h1>List of Activated Users</h1>


            <form method="post">
                <input type="text" name="search" placeholder="Search All Users">
            </form>

            <?php 
                if(isset($_POST['search']) && $current_user['type'] == 'Admin'){
                    $search = $_POST['search'];
            ?>

                <table id="users">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>School</th>
                            <th>Sport</th>
                            <th>Gender</th>
                            <th>Type</th>
                            <th>Actions</th>
                        <tr>
                </thead>
                <tbody>
                    <?php 
                        $searchUsers = $pdo->searchUser($search);
                        if(is_array($searchUsers) && !empty($searchUsers)){
                            foreach($searchUsers as $searchUser){
                    ?>
                    <tr>
                        <td><?php echo $searchUser['name']; ?></td>
                        <td><?php echo $searchUser['email']; ?></td>
                        <td>
                            <?php if(!empty($searchUser['school'])){
                                echo $searchUser['school'];
                            }else{
                                echo $searchUser['previous_school'];
                            } ?></td>
                        <td><?php echo $searchUser['sport']; ?></td>
                        <td><?php echo $searchUser['gender']; ?></td>
                        <td><?php echo $searchUser['type']; ?></td>
                        <td>
                            <a class="view-profile" href="userProfile.php?id=<?php echo $searchUser['id']?>">View Profile</a>
                            <form method="post" class="delete-form">
                                <input type="hidden" name="id" value="<?php echo $searchUser['id']?>"/>
                                <button class="delete-button" type="submit" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php } }?>
                </tbody>
                </table>
            <?php }else{ ?>


                <table id="users">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>School</th>
                            <th>Sport</th>
                            <th>Gender</th>
                            <th>Type</th>
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
            <?php } ?>
            </center>
        <?php }elseif($current_user['type'] == 'Coach'){ ?>
            <center>
            <h1>List of Registered Athletes</h1>

            <form method="post">
                <input type="text" name="searchAthlete" placeholder="Search All Athletes">
            </form>

            <?php 
                if(isset($_POST['searchAthlete']) && $current_user['type'] == 'Coach'){
                    $search = $_POST['searchAthlete'];
            ?>
                <table id="users">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>School</th>
                            <th>Last School Attended</th>
                            <th>Gender</th>
                            <th>Address</th>
                            <th>Actions</th>
                        <tr>
                </thead>
                <tbody>
                    <?php 
                        $athletes = $pdo->searchAthlete($search,$current_user['sport']);
                        if(is_array($athletes) && !empty($athletes)){
                            foreach($athletes as $athlete){
                    ?>
                    <tr>
                        <td><?php echo $athlete['name']; ?></td>
                        <td><?php echo $athlete['email']; ?></td>
                        <td><?php if(empty($athlete['school'])){
                            echo 'N/A';}
                        ?></td>
                        <td><?php echo $athlete['previous_school']; ?></td>
                        <td><?php echo $athlete['gender']; ?></td>
                        <td><?php echo $athlete['contact']; ?></td>
                        <td><?php echo $athlete['address']; ?></td>
                        <td>
                            <a class="view-profile" href="userProfile.php?id=<?php echo $athlete['id']?>">View Profile</a>
                            <form method="post" class="delete-form">
                                <input type="hidden" name="id" value="<?php echo $athlete['id']?>"/>
                                <button class="delete-button" type="submit" name="delete">Delete</button>
                            </form>
                        </td>
                    </tr>
                    <?php } }?>
                </tbody>
                </table>
            <?php }else{ ?>
                <table id="users">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>E-mail</th>
                            <th>School</th>
                            <th>Last School Attended</th>
                            <th>Gender</th>
                            <th>Contact</th>
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
                        <td><?php echo $user['gender']; ?></td>
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
            <?php } ?>
            </center>

        <?php } ?>
    </body>
    
</html>