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
                                    <th></th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Points</th>
                                    <th>Rebounds</th>
                                    <th>Steals</th>
                                    <th>Assists</th>
                                    <th>Blocks</th>
                                    <th>Minutes Played</th>
                                    <th>Fouls</th>
                                    <th>Turnovers</th>
                                    <th>Missed Field Goals</th>
                                    <th>Player Average</th>
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
                                        <?php $imageURL = 'uploads/'.$invites["image"];?>
                                        <img src="<?php if(empty($invites["image"])){ echo 'uploads/default.png';}else{ echo $imageURL;}?>" class="table-image" />
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($player['id'])){
                                                    echo $player['name']; 
                                                }else{
                                                    echo $invites['name'];
                                                }
                                                ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($player['id'])){
                                                    echo $player['basketball_position']; 
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($player['id'])){
                                                    echo $player['basketball_points']; 
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($player['id'])){
                                                    echo $player['basketball_rebounds'];
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($player['id'])){
                                                    echo $player['basketball_steals'];
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($player['id'])){
                                                    echo $player['basketball_blocks'];
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($player['id'])){
                                                    echo $player['basketball_rebounds'];
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($player['id'])){
                                                    echo $player['basketball_minutes_played'];
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($player['id'])){
                                                    echo $player['basketball_fouls'];
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($player['id'])){
                                                    echo $player['basketball_turnovers'];
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($player['id'])){
                                                    echo $player['basketball_missedFG'];
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($player['id'])){
                                                    echo $player['basketball_average'];
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
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
                        <?php }elseif($current_user['sport'] == 'Football'){ 
                            
                        ?>
                            <!-- Football Stats not available yet -->
                        <?php }elseif($current_user['sport'] == 'Volleyball'){ 
                                $volleyballInvites = $pdo->invitedAthletes($current_user['id']);
                                if(empty($volleyballInvites)){
                    
                        ?>
                            <h1>No Invited Athletes</h1>
                        <?php }else{ ?>
                            <h1>Invited Athletes</h1>
                            <table id="users" class="table">
                            <thead>
                                <tr>
                                    <th></th>
                                    <th>Name</th>
                                    <th>Position</th>
                                    <th>Kills</th>
                                    <th>Assists</th>
                                    <th>Service Ace</th>
                                    <th>Digs</th>
                                    <th>Blocks</th>
                                    <th>Player Average</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                    
                                    if(is_array($volleyballInvites) && !empty($volleyballInvites)){
                                        foreach($volleyballInvites as $volleyball){
                                        $volley = $pdo->VolleyballPlayerStats($volleyball['id']);
                                ?>
                                <tr>
                                    <td>
                                        <?php $imageURL = 'uploads/'.$volleyball["image"];?>
                                        <img src="<?php if(empty($volley["image"])){ echo 'uploads/default.png';}else{ echo $imageURL;}?>" class="table-image" />
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($volley['id'])){
                                                    echo $volley['name']; 
                                                }else{
                                                    echo $volleyball['name'];
                                                }
                                                ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($volley['id'])){
                                                    echo $volley['volleyball_position']; 
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($volley['id'])){
                                                    echo $volley['volleyball_kills']; 
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($volley['id'])){
                                                    echo $volley['volleyball_assists'];
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($volley['id'])){
                                                    echo $volley['volleyball_service_ace'];
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($volley['id'])){
                                                    echo $volley['volleyball_digs'];
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($volley['id'])){
                                                    echo $volley['volleyball_blocks'];
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <strong><?php if(!empty($volley['id'])){
                                                    echo $volley['volleyball_average'];
                                                }else{
                                                    echo 'N/A';
                                                } ?>
                                        </strong>
                                    </td>
                                    <td>
                                        <form method="post">
                                            <input type="hidden" name="id" value="<?php echo $volleyball['invite_id']?>" />
                                            <button class="remove-invitation" name="basketball-invitation" type="submit">Remove Invitation</button>
                                        </form>
                                    </td>
                                </tr>
                                <?php } } ?>
                            </tbody>
                        </table>
                        <?php } ?>

                        <?php }else{ ?>
                        <?php } ?>
                </div>
        </center>
    </body>
</html>