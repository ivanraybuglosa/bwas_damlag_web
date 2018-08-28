<?php
 include_once 'android_db_connect.php';
 class User{
        
    private $db;
    private $db_table = "users";
    public function __construct(){
        $this->db = new DbConnect();
    }
    public function showProfile($id){
            
        $query = "select * from ".$this->db_table." INNER JOIN volleyball ON users.id = volleyball.user_id WHERE users.id = '$id'";
        
        $result = mysqli_query($this->db->getDb(), $query);
        $rows=mysqli_num_rows($result);
        if($rows > 0){
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
                $json['kills'] = $row['volleyball_kills'];
                $json['assists'] = $row['volleyball_assists'];
                $json['service_ace'] = $row['volleyball_service_ace'];
                $json['digs'] = $row['volleyball_digs'];
                $json['blocks'] = $row['volleyball_blocks'];
                $json['games'] = $row['volleyball_total_games_played'];
            
            }
            print(json_encode($json));
        }else{
            $query1 = "select * from ".$this->db_table." WHERE id = '$id'";
        
            $result1 = mysqli_query($this->db->getDb(), $query1);
            while($row =  $result1->fetch_assoc()) {
                $json['name'] = $row['name'];
                $json['email'] = $row['email'];
                $json['contactNumber'] = $row['contact'];
                $json['address'] = $row['address'];
                $json['birthdate'] = $row['birthdate'];
                $json['school'] = $row['previous_school'];
                $json['gender'] = $row['gender'];
                $json['position'] = $row['position'];
                $json['sport'] = $row['sport'];
                $json['kills'] = 'n/a';
                $json['assists'] = 'n/a';
                $json['service_ace'] = 'n/a';
                $json['digs'] = 'n/a';
                $json['blocks'] = 'n/a';
                $json['games'] = 'n/a';
            
            }
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