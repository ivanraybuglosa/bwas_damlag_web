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
            input[type=text], input[type=number], select{
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
        </style>
    </head>
    <body>
        <?php include('navbar.php') ?>
        <div class="container">
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

                    <table id="users" class="table">
                        <thead>
                            <tr>
                                <th></th>
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
                            <td>
                                <center>
                                    <img src="<?php if(empty($searchUser["image"])){ echo 'uploads/default.png';}else{ echo $imageURL;};?>" class="table-image" />
                                </center>
                            </td>
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
                                <th></th>
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
                                <td>
                                    <center>
                                        <img src="<?php if(empty($user["image"])){ echo 'uploads/default.png';}else{ echo $imageURL;};?>" class="table-image" />
                                    </center>
                                </td>
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
                    <input type="text" name="searchAthlete" placeholder="Athlete Name">
                    <?php 
                        if($current_user['sport'] == 'Basketball'){
                    ?>
                        <select name="searchPosition">
                            <option value="">Search Position</option>
                            <option value="Point Guard">Point Guard</option>
                            <option value="Shooting Guard">Shooting Guard</option>
                            <option value="Small Forward">Small Forward</option>
                            <option value="Power Forward">Power Forward</option>
                            <option value="Center">Center</option>
                        </select>
                    <?php }elseif($current_user['sport'] == 'Volleyball'){ ?>
                        <select name="searchPosition">
                            <option value="">Search Position</option>
                            <option value="Outside hitter">Outside hitter</option>
                            <option value="Right Side Hitter">Right Side Hitter</option>
                            <option value="Opposite Hitter">Opposite Hitter</option>
                            <option value="Setter">Setter</option>
                            <option value="Middle Blocker">Middle Blocker</option>
                            <option value="Libero">Libero</option>
                            <option value="Defensive Specialist">Defensive Specialist</option>
                        </select>

                    <?php }else{ ?>
                        <select name="searchPosition">
                            <option value="">Search Position</option>
                            <option value="Forward">Forward</option>
                            <option value="Striker">Striker</option>
                            <option value="Left Midfielder">Left Midfielder</option>
                            <option value="Defensive Midfielder">Defensive Midfielder</option>
                            <option value="FemRight Midfielderale">Right Midfielder</option>
                            <option value="Left Back">Left Back</option>
                            <option value="Sweeper">Sweeper</option>
                            <option value="Stopper">Stopper</option>
                            <option value="Right back">Right back</option>
                            <option value="Goal Keeper">Goal Keeper</option>
                        </select>

                    <?php } ?>
                    <select name="searchGender">
                        <option value="">Search Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                    <input type="number" name="searchAge" placeholder="Age" min="0" max="100">
                    <button class="search-button" name="search-submit" type="submit">Search</button>
                </form>

                <?php 
                    if(isset($_POST['search-submit']) && $current_user['type'] == 'Coach'){
                        echo $searchAthlete = $_POST['searchAthlete'];
                        echo $searchPosition = $_POST['searchPosition'];
                        echo $searchGender = $_POST['searchGender'];
                        echo $searchAge = $_POST['searchAge'];
                ?>
                    <table id="users" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Username</th>
                                <th>Position</th>
                                <th>E-mail</th>
                                <th>Last School Attended</th>
                                <th>Gender</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Actions</th>
                            <tr>
                        </thead>
                        <tbody>
                            <?php 
                                $athletes = $pdo->searchAthlete($searchAthlete,$searchGender,$searchAge,$searchPosition,$current_user['sport']);
                                if(is_array($athletes) && !empty($athletes)){
                                    foreach($athletes as $athlete){
                            ?>
                            <tr>
                                <td>
                                    <center>
                                    <?php $imageURL = 'uploads/'.$athlete["image"];?>
                                        <img src="<?php if(empty($athlete["image"])){ echo 'uploads/default.png';}else{ echo $imageURL;};?>" class="table-image" />
                                    </center>
                                </td>
                                <td><?php echo $athlete['name']; ?></td>
                                <td><?php echo $athlete['position'] ?></td>
                                <td><?php echo $athlete['email']; ?></td>
                                <td><?php echo $athlete['previous_school']; ?></td>
                                <td><?php echo $athlete['gender']; ?></td>
                                <td><?php echo $athlete['contact']; ?></td>
                                <td><?php echo $athlete['address']; ?></td>
                                <td width="11%">
                                    <a class="view-profile" href="userProfile.php?id=<?php echo $athlete['id']?>">View Profile</a>
                                </td>
                            </tr>
                            <?php } }?>
                        </tbody>
                    </table>
                <?php }else{ ?>
                    <table id="users" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Username</th>
                                <th>Position</th>
                                <th>E-mail</th>
                                <th>Last School Attended</th>
                                <th>Gender</th>
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
                            <td>
                                <center>
                                    <?php $imageURL = 'uploads/'.$user["image"];?>
                                    <img src="<?php if(empty($user["image"])){ echo 'uploads/default.png';}else{ echo $imageURL;}?>" class="table-image" />
                                </center>
                            </td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['position'] ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php echo $user['previous_school']; ?></td>
                            <td><?php echo $user['gender']; ?></td>
                            <td><?php echo $user['contact']; ?></td>
                            <td><?php echo $user['address']; ?></td>
                            <td width="20%">
                                <a class="view-profile" href="userProfile.php?id=<?php echo $user['id']?>">View Profile</a>
                            </td>
                        </tr>
                        <?php } }?>
                    </tbody>
                    </table>
                <?php } ?>
                </center>

            <?php } ?>
        </div>
    </body>
    
</html>