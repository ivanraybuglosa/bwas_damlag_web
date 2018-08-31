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
            <center><img src="<?php if(empty($user["image"])){ echo 'uploads/default.png';}else{ echo $imageURL;};?>" class="image" /></center>
            <center><h1><?php echo $user['name']?> - <?php echo $user['school']?> - <?php echo $user['sport']?></h1></center>
            <?php if($current_user['sport'] == 'Basketball'){?>
                



            <?php } ?>
        <?php }else{?>
           
                <?php $imageURL = 'uploads/'.$user["image"];?>
                <center><img src="<?php if(empty($user["image"])){ echo 'uploads/default.png';}else{ echo $imageURL;};?>" class="image" /></center>
                <center><h1><?php echo $user['name']?> - <?php if(!empty($user['school'])){ echo $user['school'];}else{echo $user['previous_school'];} ?> - <?php echo $user['sport']?> Athlete</h1></center>
                <div class="container">
                <center>   
                <?php if($current_user['type'] == 'Coach'){ ?>
                        <?php 
                            $check = $pdo->checkInvite($user['id'], $current_user['id']);
                                if(empty($check)){
                        ?>
                            <form method="post" class="invite-form">
                                <input type="hidden" value="<?php echo $current_user['id'] ?>" name="coach_id" />
                                <input type="hidden" value="<?php echo $user['id'] ?>" name="athlete_id" />
                                <input type="hidden" value="<?php echo $current_user['name']?> invited you for a tryout" name="message" />
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
                        <?php } ?>
                        <br>
                        <strong><?php echo $user['position']?> -</strong>
                        <strong><?php echo $user['email']?> -</strong>
                        <strong><?php echo $user['contact']?> -</strong>
                        <strong><?php echo $user['gender']?> -</strong>
                        <strong><?php echo $user['address']?> -</strong>
                        
                        <strong><?php echo date('F j,Y', strtotime($user['birthdate']))?></strong>


                        
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

                 
           
        <?php } ?>
        </div>
    </body>
</html>
