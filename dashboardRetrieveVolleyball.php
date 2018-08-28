<?php
 include_once 'android_db_connect.php';
 class User{
        
    private $db;
    private $db_table = "volleyball";
    public function __construct(){
        $this->db = new DbConnect();
    }
    public function showDashboard(){
            
        $query = "select * from volleyball INNER JOIN users ON volleyball.user_id = users.id ORDER BY volleyball_average DESC";
            
        $result = mysqli_query($this->db->getDb(), $query);
        
            while($row =  $result->fetch_array()) {
                $json[] = $row;
            }
            print(json_encode($json));
    }
    
}
$id = "";
if(isset($_POST['id'])){
        
    $id = $_POST['id'];
    
}
$userObject = new User();
$userObject->showDashboard();
?>