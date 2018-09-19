<?php
    include_once('web_db.php');
    include_once('authentication.php');

    $id = $_GET['id'];
    $user = $pdo->findClient($id);
    
    if(isset($_POST['invites'])){
        $athlete_id = $_POST['athlete_id'];
        $coach_id = $_POST['coach_id'];
        $created_at = date('Y-m-d H:i s');
        $coach_name = $_POST['coach_name'];

        if($_POST['message'] == ""){
            $message = $coach_name. "has invited you for a tryout.";
        }else{
            $message = $_POST['message'];
        }

        if($pdo->athleteInvites($coach_id,$athlete_id,$message,$created_at)){
            echo "<script>alert('Invite has been sent!');window.location.href='userProfile.php?id=".$athlete_id."';</script>";
        }else{
            echo "<script>alert('Unable to send invite');window.location.href='userProfile.php?id=".$athlete_id."';</script>";
        }
    }
    
    if(isset($_POST['delete-invite'])){
        $invite = $_POST['invite_id'];
        $athlete_id = $_POST['athlete_id'];

        if($pdo->deleteInvites($invite)){
            echo "<script>alert('Invite has been successfully removed!');window.location.href='userProfile.php?id=".$athlete_id."';</script>";
        }else{
            echo "<script>alert('Unable to remove invite');window.location.href='userProfile.php?id=".$athlete_id."';</script>";
        }
    }
?>
<html>
    <head>
        <title>Profile</title>
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
        <?php include_once('navbar.php'); ?>
        <?php if($user['type'] ==  'Coach'){ ?>
            <?php $imageURL = 'uploads/'.$user["image"];?>
            <center><img src="<?php if(empty($user["image"])){ echo 'https://buasdamlag.000webhostapp.com/uploads/default.png';}else{ echo $user["image"];};?>" class="image" /></center>
                <center>
                        <strong>Name: <?php echo $user['name']?></strong><br>
                        <strong>Address: <?php echo $user['address']?></strong><br>
                        <strong>Contact Number: <?php echo $user['contact']?></strong><br>
                        <strong>Email: <?php echo $user['email']?></strong><br>
                        <strong>Last School Attended: <?php if(!empty($user['school'])){ echo $user['school'];}else{echo $user['previous_school'];} ?></strong><br>                          
                        <strong>Gender: <?php echo $user['gender']?></strong><br>
                        <strong>User Type: <?php echo $user['type']?></strong><br>
                    </center>
        <?php }else{?>
                <center><img src="<?php if(empty($user["image"])){ echo 'https://buasdamlag.000webhostapp.com/uploads/default.png';}else{ echo $user["image"];};?>" class="image" /></center>
                <div class="container">
                <center>   
                    <center>
                        <strong>Name: <?php echo $user['name']?></strong><br>
                        <strong>Address: <?php echo $user['address']?></strong><br>
                        <strong>Contact Number: <?php echo $user['contact']?></strong><br>
                        <strong>Email: <?php echo $user['email']?></strong><br>
                        <strong>Last School Attended: <?php if(!empty($user['school'])){ echo $user['school'];}else{echo $user['previous_school'];} ?></strong><br>                        
                        <strong>Gender: <?php echo $user['gender']?></strong><br>
                        <strong>User Type: <?php echo $user['type']?></strong><br>
                    </center>
                    
                    <?php 
                    if($user['sport'] == 'Basketball'){
                        $player = $pdo->BasketballPlayerStats($user['id'])
                ?>
                    <br>
                    <table id="users" class="table">
                        <thead>
                            <th>Position</th>
                            <th>Rebounds</th>
                            <th>Steals</th>
                            <th>Assists</th>
                            <th>Blocks</th>
                            <th>Points</th>
                        </thead>
                        <tbody>
                            <td><?php echo $player['basketball_position']?></td>
                            <td><?php echo $player['basketball_rebounds']?></td>
                            <td><?php echo $player['basketball_steals']?></td>
                            <td><?php echo $player['basketball_assists']?></td>
                            <td><?php echo $player['basketball_blocks']?></td>
                            <td><?php echo $player['basketball_points']?></td>
                        </tbody>
                    </table>
                <?php } ?>

                        
                        <?php if(!empty($user['youtube'])){
                            $url = $user['youtube'];
                            preg_match('/[\\?\\&]v=([^\\?\\&]+)/', $url, $matches);
                            $youtube = $matches[1];
                        ?>
                            <iframe class="youtube-link" id="ytplayer" type="text/html"
                            src="https://www.youtube.com/embed/<?php echo $youtube ?>?rel=0&showinfo=0&color=white&iv_load_policy=3"
                            frameborder="0" allowfullscreen></iframe> 
                        <?php } ?>
                        </center>
                        </div>
                
                        
                <?php if($current_user['type'] == 'Coach'){ ?>
                    <center>
                        
                        <?php 
                            $check = $pdo->checkInvite($user['id'], $current_user['id']);
                                if(empty($check)){
                        ?>
                            
                            <form method="post" class="invite-form">
                                <small>Message:</small><br>
                                <textarea name="message" rows="4" cols="50" placeholder="Enter your message" required></textarea>
                                <input type="hidden" value="<?php echo $current_user['id'] ?>" name="coach_id" />
                                <input type="hidden" value="<?php echo $user['id'] ?>" name="athlete_id" />
                                <input type="hidden" value="<?php echo $current_user['name'] ?>" name="coach_name" /><br>
                                <button class="invite-profile" type="submit" name="invites">Invite Athlete</button>
                            </form>
                        <?php }
                                else
                                {
                            ?>
                            <form method="post" class="invite-form">
                                <input type="hidden" value="<?php echo $check['invite_id'] ?>" name="invite_id" />
                                <input type="hidden" value="<?php echo $user['athlete_id'] ?>" name="athlete_id" />
                                <button class="remove-invite" type="submit" name="delete-invite">Remove Invite</button>
                            </form>
                        <?php } ?>
                    </center>
                <?php } ?>
                        <br>
                        
            
                 
           
        <?php } ?>
        
    </body>
</html>
