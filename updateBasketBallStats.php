<?php 
include_once 'android_db_connect.php';
class User{
    
    private $db;
    private $db_table = "users";
    public function __construct(){
        $this->db = new DbConnect();
    }
    public function updateBasketballStats($id,$position,$points,$rebounds,$steals,$assists,$blocks,$fouls,$turnovers,$missedFG,$minutes){
        $pointsInt = (int)$points;
        $rebounds = (int)$rebounds;
        $steals = (int)$steals;
        $assists = (int)$assists;
        $blocks = (int)$blocks;
        $fouls = (int)$fouls;
        $turnovers = (int)$turnovers;
        $missedFG = (int)$missedFG;

        


        $isAvail = $this->isInserted($id);
        if($isAvail == true){
            $average = ($pointsInt+$rebounds+$steals+$assists+$blocks) - ($fouls+$turnovers+$missedFG);
            $query = "UPDATE basketball set 
            `basketball_assists` = '$assists',
            `basketball_position` = '$position', `basketball_points` = '$pointsInt', `basketball_rebounds` = '$rebounds', 
            `basketball_steals` = '$steals', `basketball_blocks`='$blocks', `basketball_fouls`='$fouls', 
            `basketball_turnovers` = '$turnovers', `basketball_missedFG` = '$missedFG',`basketball_average` = '$average', `basketball_minutes_played` = '$minutes' WHERE `user_id` = '$id'";
             $result = mysqli_query($this->db->getDb(), $query);
             $query2 = "SELECT * FROM users WHERE `id` = $id";
             $query3 = "UPDATE users set `position` = '$position' WHERE `id` = '$id'";
            mysqli_query($this->db->getDb(), $query3);
            $result2 = mysqli_query($this->db->getDb(), $query2);
            $row =  $result2->fetch_assoc();
            $json['name'] = $row['name'];
            $json['email'] = $row['email'];
            $json['id']=$id;
            $json['message']="Basketball Stats Updated";
        }else{
            $average = ($pointsInt+$rebounds+$steals+$assists+$blocks) - ($fouls+$turnovers+$missedFG);
            $query = "INSERT into basketball (basketball_position,basketball_assists, basketball_points, basketball_rebounds, basketball_steals, basketball_blocks, basketball_fouls, basketball_turnovers, basketball_missedFG,basketball_average, user_id,basketball_minutes_played) 
            values ('$position','$assists', '$points','$rebounds', '$steals', '$blocks', '$fouls', '$turnovers', '$missedFG','$average', '$id','$minutes')";
            $result = mysqli_query($this->db->getDb(), $query);
            $query2 = "SELECT name, email FROM users WHERE id = $id";
            $result2 = mysqli_query($this->db->getDb(), $query2);
            $query3 = "UPDATE users set `position` = '$position' WHERE `id` = '$id'";
            mysqli_query($this->db->getDb(), $query3);
            $row =  $result2->fetch_assoc();
            $json['name'] = $row['name'];
            $json['email'] = $row['email'];
            $json['id']=$id;
            $json['message']="Basketball Stats Inserted";
        }
        
        return $json;
    }
    public function isInserted($id){
        
            
            $query = "SELECT * FROM basketball WHERE `user_id` = '$id'";
            
            $result = mysqli_query($this->db->getDb(), $query);

            if(mysqli_num_rows($result)==0){
                return false;
            }else{
                return true;
            }
        }
        
}

    $position = "";
    $rebounds = "";
    $points = "";
    $assists = "";
    $steals = "";
    $blocks = "";
    $fouls = "";
    $turnovers = "";
    $missedFG="";
    $id = "";
    $minutes = "";

    if(isset($_POST['minutes'])){
        
        $minutes = $_POST['minutes'];
        
    }
    if(isset($_POST['position'])){
        
        $position = $_POST['position'];
        
    }
    if(isset($_POST['assists'])){
        
        $assists = $_POST['assists'];
        
    }
    if(isset($_POST['rebounds'])){
        
        $rebounds = $_POST['rebounds'];
        
    }
    if(isset($_POST['points'])){
        
        $points = $_POST['points'];
        
    }
    if(isset($_POST['steals'])){
        
        $steals = $_POST['steals'];
        
    }
    if(isset($_POST['blocks'])){
        
        $blocks = $_POST['blocks'];
        
    }
    if(isset($_POST['fouls'])){
        
        $fouls = $_POST['fouls'];
        
    }
    
    if(isset($_POST['turnovers'])){
        
        $turnovers = $_POST['turnovers'];
        
    }
    if(isset($_POST['missedFG'])){
        
        $missedFG = $_POST['missedFG'];
        
    }
    if(isset($_POST['id'])){
        
        $id = $_POST['id'];
        
    }

    $userObject = new User();

    $updateJson = $userObject->updateBasketballStats($id,$position,$points,$rebounds,$steals,$assists,$blocks,$fouls,$turnovers,$missedFG,$minutes);
    
    echo json_encode($updateJson);

    ?>