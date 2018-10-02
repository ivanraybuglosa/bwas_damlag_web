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
                width: 250px;
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
                    <input type="text" name="search" placeholder="Search Users">
                    <select name="type">
                            <option value="">Select User Type</option>
                            <option value="Coach">Coach</option>
                            <option value="Athlete">Athlete</option>
                    </select>
                    <select name="gender">
                            <option value="">Select Gender</option>
                            <option value="Male">Male</option>
                            <option value="Female">Female</option>
                    </select>
                    <button class="search-button" name="search-submit" type="submit">Search</button>
                </form>
                <?php 
                    if(isset($_POST['search']) && $current_user['type'] == 'Admin'){
                        $search = $_POST['search'];
                        $type = $_POST['type'];
                        $sport = "Basketball";
                        $gender = $_POST['gender'];
                ?>

                    <table id="users" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>School</th>
                                <th>Age</th>
                                <th>Sport</th>
                                <th>Gender</th>
                                <th>Type</th>
                                <th>Actions</th>
                            <tr>
                    </thead>
                    <tbody>
                        <?php 
                            $searchUsers = $pdo->searchUser($search,$type,$sport,$gender);
                            $rank = 0;
                            if(is_array($searchUsers) && !empty($searchUsers)){
                                foreach($searchUsers as $searchUser){
                                    $rank += 1;
                        ?>
                        <tr>
                            <td>
                                <center>
                                    <img src="<?php if(empty($searchUser["image"])){ echo 'https://buasdamlag.000webhostapp.com/uploads/default.png';}else{ echo $searchUser["image"]; };?>" class="table-image" />
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
                            <td>
                                <?php 
                                    $now = new Datetime();
                                    $birthdate = new Datetime($searchUser['birthdate']);
                                    $age = $now->diff($birthdate);
                                    echo $age->y;
                                ?>
                            </td>
                            <td><?php echo $searchUser['sport']; ?></td>
                            <td><?php echo $searchUser['gender']; ?></td>
                            <td><?php echo $searchUser['type']; ?></td>
                            <td width="20%">
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
                                <th>Name</th>
                                <th>E-mail</th>
                                <th>School</th>
                                <th>Age</th>
                                <th>Sport</th>
                                <th>Gender</th>
                                <th>Type</th>
                                <th>Actions</th>
                            <tr>
                        </thead>
                        <tbody>
                            <?php 
                                $users = $pdo->fetchUsers();
                                $rank = 0;
                                if(is_array($users) && !empty($users)){
                                    foreach($users as $user){
                                        $rank +=1;
                            ?>
                            <tr>
                                <td>
                                    <center>
                                        <img src="<?php if(empty($user["image"])){ echo 'https://buasdamlag.000webhostapp.com/uploads/default.png' ;}else{ echo $user["image"];};?>" class="table-image" />
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
                                <td>
                                    <?php 
                                        $now = new Datetime();
                                        $birthdate = new Datetime($user['birthdate']);
                                        $age = $now->diff($birthdate);
                                        echo $age->y;
                                    ?>
                                </td>
                                <td><?php echo $user['sport']; ?></td>
                                <td><?php echo $user['gender']; ?></td>
                                <td><?php echo $user['type']; ?></td>
                                <td width="20%">
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
                    <input type="text" name="name" placeholder="Athlete Name">
                        <select name="position">
                            <option value="">Search Position</option>
                            <option value="Point Guard">Point Guard</option>
                            <option value="Shooting Guard">Shooting Guard</option>
                            <option value="Small Forward">Small Forward</option>
                            <option value="Power Forward">Power Forward</option>
                            <option value="Center">Center</option>
                        </select>
                    <select name="gender">
                        <option value="">Search Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select><br>
                    <input type="number" name="startAge" placeholder="Start Age Filter" min="0" max="100">
                    <input type="number" name="endAge" placeholder="End Age Filter" min="0" max="100">
                    <button class="search-button" name="search-submit" type="submit">Search</button>
                </form>
                <?php 
                    if(isset($_POST['search-submit']) && $current_user['type'] == 'Coach'){
                        $searchAthlete = $_POST['name'];
                        $searchPosition = $_POST['position'];
                        $searchGender = $_POST['gender'];
                        $startAge = $_POST['startAge'];
                        $endAge = $_POST['endAge'];

                        if($searchAthlete == "" && $searchPosition == "" && $searchGender == "" && $startAge == 1970 && $endAge == 1970){
                ?>
                        <table id="users" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Rank Points</th>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>E-mail</th>
                                <th>Last School Attended</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Actions</th>
                            <tr>
                    </thead>
                    <tbody>
                        <?php 
                            $users = $pdo->fetchAllAthletes($current_user['sport']);
                            $rank = 0;
                            if(is_array($users) && !empty($users)){
                                foreach($users as $user){
                                    $rank += 1;
                        ?>
                        <tr>
                            <td>
                                <center>
                                    <img src="<?php if(empty($user["image"])){ echo 'https://buasdamlag.000webhostapp.com/uploads/default.png';}else{ echo $user["image"];}?>" class="table-image" />
                                </center>
                            </td>
                            <td><?php
                                    if(empty($user['ranking_average'])){
                                        echo 'N/A';
                                    }else{
                                        echo $user['ranking_average'];
                                    } ?>
                            </td>
                            <td><?php echo $rank ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['position'] ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php if(empty($user['previous_school'])){
                                    echo 'N/A';
                                }else{
                                    echo $user['previous_school'];
                                }?>
                            </td>
                            <td>
                                <?php 
                                    $now = new Datetime();
                                    $birthdate = new Datetime($user['birthdate']);
                                    $age = $now->diff($birthdate);
                                    echo $age->y;
                                ?>
                            </td>
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
                <?php }else{ ?>
                    <table id="users" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Rank Points</th>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>E-mail</th>
                                <th>Last School Attended</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Actions</th>
                            <tr>
                        </thead>
                        <tbody>
                            <?php
                                $athletes = $pdo->searchAthlete($searchAthlete,$searchGender,$startAge,$endAge,$searchPosition,$current_user['sport']);
                                $rank = 0;
                                if(is_array($athletes) && !empty($athletes)){
                                    foreach($athletes as $athlete){
                                        $rank += 1;
                            ?>
                            <tr>
                                <td>
                                    <center>
                                        <img src="<?php if(empty($athlete["image"])){ echo 'https://buasdamlag.000webhostapp.com/uploads/default.png';}else{ echo $athlete["image"];};?>" class="table-image" />
                                    </center>
                                </td>
                                <td><?php
                                    if(empty($athlete['ranking_average'])){
                                        echo 'N/A';
                                    }else{
                                        echo $athlete['ranking_average'];
                                    } ?>
                            </td>
                                <td><?php echo $rank ?></td>
                                <td><?php echo $athlete['name']; ?></td>
                                <td><?php echo $athlete['position'] ?></td>
                                <td><?php echo $athlete['email']; ?></td>
                                <td><?php if(empty($athlete['previous_school'])){
                                    echo 'N/A';
                                }else{
                                    echo $athlete['previous_school'];
                                }?>
                                </td>
                                <td>
                                    <?php 
                                        $now = new Datetime();
                                        $birthdate = new Datetime($athlete['birthdate']);
                                        $age = $now->diff($birthdate);
                                        echo $age->y;
                                    ?>
                                </td>
                                <td><?php echo $athlete['gender']; ?></td>
                                <td><?php echo $athlete['contact']; ?></td>
                                <td><?php echo $athlete['address']; ?></td>
                                <td width="20%">
                                    <a class="view-profile" href="userProfile.php?id=<?php echo $athlete['id']?>">View Profile</a>
                                </td>
                            </tr>
                            <?php } }?>
                        </tbody>
                    </table>
                <?php } ?>
                <?php }else{ ?>
                    <table id="users" class="table">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Rank Points</th>
                                <th>Rank</th>
                                <th>Name</th>
                                <th>Position</th>
                                <th>E-mail</th>
                                <th>Last School Attended</th>
                                <th>Age</th>
                                <th>Gender</th>
                                <th>Contact Number</th>
                                <th>Address</th>
                                <th>Actions</th>
                            <tr>
                    </thead>
                    <tbody>
                        <?php 
                            $users = $pdo->fetchAllAthletes($current_user['sport']);
                            $rank = 0;
                            if(is_array($users) && !empty($users)){
                                foreach($users as $user){
                                    $rank += 1;
                        ?>
                        <tr>
                            <td>
                                <center>
                                    <img src="<?php if(empty($user["image"])){ echo 'https://buasdamlag.000webhostapp.com/uploads/default.png';}else{ echo $user["image"];}?>" class="table-image" />
                                </center>
                            </td>
                            <td><?php
                                    if(empty($user['ranking_average'])){
                                        echo 'N/A';
                                    }else{
                                        echo $user['ranking_average'];
                                    } ?>
                            </td>
                            <td><?php echo $rank ?></td>
                            <td><?php echo $user['name']; ?></td>
                            <td><?php echo $user['position'] ?></td>
                            <td><?php echo $user['email']; ?></td>
                            <td><?php if(empty($user['previous_school'])){
                                    echo 'N/A';
                                }else{
                                    echo $user['previous_school'];
                                }?>
                            </td>
                            <td>
                                <?php 
                                    $now = new Datetime();
                                    $birthdate = new Datetime($user['birthdate']);
                                    $age = $now->diff($birthdate);
                                    echo $age->y;
                                ?>
                            </td>
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