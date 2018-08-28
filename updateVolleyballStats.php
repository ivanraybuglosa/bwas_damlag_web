<?php 
include_once 'android_db_connect.php';
class User{
    
    private $db;
    private $db_table = "users";
    public function __construct(){
        $this->db = new DbConnect();
    }
    public function updateVolleyballStats($id,$position,$kills,$assists,$serviceAce,$digs,$blocks,$totalGames){
        $kills = (int)$kills;
        $assists = (int)$assists;
        $serviceAce = (int)$serviceAce;
        $digs = (int)$digs;
        $blocks = (int)$blocks;
        $totalGames = (int)$totalGames;
        $isAvail = $this->isInserted($id);
        if($isAvail == true){
            $average = ($kills+$assists+$serviceAce+$digs+$blocks) / $totalGames;
            $query = "UPDATE volleyball set 
            `volleyball_position` = '$position',
            `volleyball_kills` = '$kills', `volleyball_assists` = '$assists', `volleyball_service_ace` = '$serviceAce', 
            `volleyball_digs` = '$digs', `volleyball_blocks`='$blocks', `volleyball_total_games_played`='$totalGames',`volleyball_total_games_played` = '$average' WHERE `user_id` = '$id'";
             $result = mysqli_query($this->db->getDb(), $query);
             $query2 = "SELECT * FROM users WHERE `id` = $id";
             $query3 = "UPDATE users set `position` = '$position' WHERE `id` = '$id'";
            mysqli_query($this->db->getDb(), $query3);
            $result2 = mysqli_query($this->db->getDb(), $query2);
            $row =  $result2->fetch_assoc();
            $json['name'] = $row['name'];
            $json['email'] = $row['email'];
            $json['id']=$id;
            $json['message']="Volleyball Stats Updated";]
        }else{
            $average = ($kills+$assists+$serviceAce+$digs+$blocks) / $totalGames;
            $query = "INSERT INTO `volleyball`(`user_id`, `volleyball_position`, `volleyball_kills`, `volleyball_assists`, `volleyball_service_ace`, `volleyball_digs`, `volleyball_blocks`, `volleyball_average`, `volleyball_total_games_played`) 
            VALUES ('$id','$position','$kills','$assists','$serviceAce','$digs','$blocks','$average','$totalGames')";
            $result = mysqli_query($this->db->getDb(), $query);
            $query2 = "SELECT name, email FROM users WHERE id = $id";
            $result2 = mysqli_query($this->db->getDb(), $query2);
            $query3 = "UPDATE users set `position` = '$position' WHERE `id` = '$id'";
            mysqli_query($this->db->getDb(), $query3);
            $row =  $result2->fetch_assoc();
            $json['name'] = $row['name'];
            $json['email'] = $row['email'];
            $json['id']=$id;
            $json['message']="Volleyball Stats Inserted";
        }
        
        return $json;
    }
    public function isInserted($id){
        
            
            $query = "SELECT * FROM Volleyball WHERE `user_id` = '$id'";
            
            $result = mysqli_query($this->db->getDb(), $query);

            if(mysqli_num_rows($result)==0){
                return false;
            }else{
                return true;
            }
        }
        
}
    $position = "";
    $kills = "";
    $assists = "";
    $serviceAce = "";
    $blocks = "";
    $digs = "";
    $totalGames = "";
    $id = "";

    if(isset($_POST['kills'])){
        
        $kills = $_POST['kills'];
        
    }
    if(isset($_POST['position'])){
        
        $position = $_POST['position'];
        
    }
    if(isset($_POST['assists'])){
        
        $assists = $_POST['assists'];
        
    }
    if(isset($_POST['service'])){
        
        $serviceAce = $_POST['service'];
        
    }
    if(isset($_POST['digs'])){
        
        $digs = $_POST['digs'];
        
    }
    if(isset($_POST['blocks'])){
        
        $blocks = $_POST['blocks'];
        
    }
    if(isset($_POST['totalGames'])){
        
        $totalGames = $_POST['totalGames'];
        
    }
    if(isset($_POST['id'])){
        
        $id = $_POST['id'];
        
    }

    $userObject = new User();

    $updateJson = $userObject->updateVolleyballStats($id,$position,$kills,$assists,$serviceAce,$digs,$blocks,$totalGames);
    
    echo json_encode($updateJson);

    ?>