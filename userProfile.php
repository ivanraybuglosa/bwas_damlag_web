<?php
    include_once('web_db.php');
    include_once('authentication.php');

    $id = $_GET['id'];
    $user = $pdo->findClient($id);
    
    if(isset($_POST['invites'])){
        $athlete_id = $_POST['athlete_id'];
        $coach_id = $_POST['coach_id'];
        $message = $_POST['message'];
        $created_at = date('Y-m-d H:i s');

        if($pdo->athleteInvites($coach_id,$athlete_id,$message,$created_at)){
            echo "<script>alert('Invite has been sent!');window.location.href='userProfile.php?id=".$athlete_id."';</script>";
        }else{
            echo "<script>alert('Unable to send invite');window.location.href='userProfile.php?id=".$athlete_id."';</script>";
        }
    }elseif(isset($_POST['delete-invites'])){
        $athlete_id = $_POST['athlete_id'];
        $coach_id = $_POST['coach_id'];

        if($pdo->deleteInvites($coach_id,$athlete_id)){
            echo "<script>alert('Invite has been sent!');window.location.href='userProfile.php?id=".$athlete_id."';</script>";
        }else{
            echo "<script>alert('Unable to send invite');window.location.href='userProfile.php?id=".$athlete_id."';</script>";
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
        <?php if($user['type'] ==  'Coach'){ ?>
            <?php $imageURL = 'uploads/'.$user["image"];?>
            <center><img src="<?php if(empty($user["image"])){ echo 'uploads/default.png';}else{ echo $imageURL;};?>" class="image" /></center>
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
            <?php $imageURL = 'uploads/'.$user["image"];?>
            <center><img src="<?php if(empty($user["image"])){ echo 'uploads/default.png';}else{ echo $imageURL;};?>" class="image" /></center>
            <center><h1><?php echo $user['name']?> - <?php if(!empty($user['school'])){ echo $user['school'];}else{echo $user['previous_school'];} ?> - <?php echo $user['sport']?> Athlete</h1></center>
            <div class="container">
            <center>   
                    <?php 
                        $check = $pdo>checkInvite($user['id'], $current_user['id']);
                            if(empty($check)){
                    ?>
                        <form method="post" class="invite-form">
                            <input type="hidden" value="<?php echo $current_user['id'] ?>" name="coach_id" />
                            <input type="hidden" value="<?php echo $user['id'] ?>" name="athlete_id" />
                            <input type="hidden" value="<?php echo $current_user['name']?> invited you for a tryout" name="message" />
                            <button class="invite-profile" type="submit" name="invites">Invite Athlete</button>
                        </form>
                    <?php }else{ ?>                
                        <form method="post" class="invite-form">
                            <input type="hidden" value="<?php echo $current_user['id'] ?>" name="coach_id" />
                            <input type="hidden" value="<?php echo $user['id'] ?>" name="athlete_id" />
                            <button class="invite-profile" type="submit" name="delete-invites">Remove Invite</button>
                        </form>
                    <?php } ?>
                        
                    <br>
                    <strong><?php echo $user['email']?> -</strong>
                    <strong><?php echo $user['contact']?> -</strong>
                    <strong><?php echo $user['gender']?> -</strong>
                    <strong><?php echo $user['address']?> -</strong>
                    <strong><?php echo date('F j,Y', strtotime($user['birthdate']))?></strong>
 
            </center>
        <?php } ?>
        </div>
    </body>
</html>
