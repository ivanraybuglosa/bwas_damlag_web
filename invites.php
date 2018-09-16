<?php
    include_once('web_db.php');
    include_once('authentication.php');

    if(isset($_POST['basketball-invitation'])){
        $id = $_POST['id'];

        if($pdo->removeInvite($id)){
            echo "<script>alert('User invite has been removed!');window.location.href='invites.php';</script>";
        }else{
            echo "<script>alert('Unable to remove user invite.');window.location.href='invites.php';</script>";
        }
    }
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Invitations</title>
        <link href="styles.css" rel="stylesheet" />
    </head>
    <body>
        <center>
            <?php include('navbar.php')?>
                <!-- <h1>Invited Athletes</h1> -->
                <div class="container">
                        <?php 
                            if($current_user['sport'] == 'Basketball'){
                                $invited = $pdo->invitedAthletes($current_user['id']);
                                if(empty($invited)){
                        ?>
                            <h1>No Invited Athletes</h1>
                        <?php }else{?>
                        <h1>Invited Athletes</h1>
                        <table id="users" class="table">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    
                                    if(is_array($invited) && !empty($invited)){
                                        foreach($invited as $invites){
                                        $player = $pdo->BasketballPlayerStats($invites['id']);
                                ?>
                                <tr>
                                    <td>
                                        <?php echo $player['name']?>
                                    </td>
                                    <td width=15%>
                                        <form method="post">
                                            <input type="hidden" name="id" value="<?php echo $invites['invite_id']?>" />
                                            <button class="remove-invitation" name="basketball-invitation" type="submit">Remove Invitation</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                        <?php } ?>
                        <?php } ?>
                                                
                </div>
        </center>
    </body>
</html>