<?php
 include_once 'android_db_connect.php';
 class User{
        
    private $db;
    private $db_table = "users";
    public function __construct(){
        $this->db = new DbConnect();
    }
    public function showProfile($id){
            
        $query = "select * from ".$this->db_table." INNER JOIN basketball ON users.id = basketball.user_id WHERE users.id = '$id'";
        
        $result = mysqli_query($this->db->getDb(), $query);
        
            while($row =  $result->fetch_assoc()) {
                $json['name'] = $row['name'];
                $json['email'] = $row['email'];
                $json['contactNumber'] = $row['contact'];
                $json['address'] = $row['address'];
                $json['birthdate'] = $row['birthdate'];
                $json['school'] = $row['previous_school'];
                $json['gender'] = $row['gender'];
                $json['position'] = $row['position'];
                $json['sport'] = $row['sport'];
                $json['points'] = $row['basketball_points'];
                $json['assists'] = $row['basketball_assists'];
                $json['rebounds'] = $row['basketball_rebounds'];
                $json['blocks'] = $row['basketball_blocks'];
                $json['steals'] = $row['basketball_steals'];
                $json['minutes'] = $row['basketball_minutes_played'];
                $json['fouls'] = $row['basketball_fouls'];
                $json['turnover'] = $row['basketball_turnovers'];
                $json['missedFG'] = $row['basketball_missedFG'];
            print(json_encode($json));
            }
    }
    
}

$id = "";
if(isset($_POST['id'])){
        
    $id = $_POST['id'];
    
}
$userObject = new User();
$userObject->showProfile($id);
?>